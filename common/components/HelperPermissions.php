<?php


/**
 * @author Chetan Rajbhandari
 */

namespace common\components;

use common\models\generated\UserRoles;
use common\models\Pages;
use common\models\Permissions;
use common\models\ScheduleRoutes;
use common\models\Schedules;
use common\models\Settings;
use common\models\User;
use common\models\UserDetails;
use common\models\Vehicles;
use Yii;
use Yii\base\Component;
use yii\helpers\ArrayHelper;

class HelperPermissions extends Component {

    public function init() {

    }

    public static function getControllers($byRoles = false) {
        foreach (Yii::$app->params['permission-interfaces'] as $k => $p) {
            $controllersPath[$p] = \Yii::getAlias('@' . $p) . '/controllers';
        }

        //    print_r($controllerPath);
        foreach ($controllersPath as $key => $path) {
            $controllerlist = [];
            if ($handle = opendir($path)) {
                while (false !== ($file = readdir($handle))) {
                    if ($file != "." && $file != ".." && substr($file, strrpos($file, '.') - 10) == 'Controller.php') {
                        $controllerlist[] = $file;
                    }
                }
                closedir($handle);
            }
            asort($controllerlist);
            $fulllist = [];
            foreach ($controllerlist as $controller):
                $handle = fopen($path . '/' . $controller, "r");
                if ($handle) {
                    while (($line = fgets($handle)) !== false) {
                        if (preg_match('/public function action(.*?)\(/', $line, $display)):
                            if (strlen($display[1]) > 2):
                                $fulllist[substr($controller, 0, -4)][] = strtolower($display[1]);
                            endif;
                        endif;
                    }
                }
                fclose($handle);
            endforeach;
            $controllers[$key] = $fulllist;
        }
        if ($byRoles === true) {
            $sorted = [];
            foreach (Yii::$app->params['role_num'] as $k => $role) {
                $sorted[$role] = $controllers;
            }
            return $sorted;
        }
        return $controllers;
    }

    public static function getPermissions() {
        $permissions = Permissions::find('id = 1')
                                  ->asArray()
                                  ->one();
        $newPermissions = self::generatePermissions();
        if (empty($permissions)) {
            $permissions = $newPermissions;
        }
        else {
            $permissions = ArrayHelper::merge($newPermissions, $permissions['permissions']);
        }
        //        print_r($permissions);
        //        die;

        return $permissions;
    }

    public static function formatControllerName($controller) {
        $words = preg_split('/(?=\p{Lu})/u', $controller);
        $words = array_slice($words, 1, -1);
        $words = join($words);
        return $words;
    }

    public static function generatePermissions() {
        $permissions = [];
        $roles = self::getControllers(true);
        foreach ($roles as $k => $environment) {
            foreach ($environment as $ke => $controllers) {
                foreach ($controllers as $kc => $actions) {
                    foreach ($actions as $action) {
                        $permissions[$k][$ke][$kc][$action] = [
                                'role'       => $k,
                                'interface'  => $ke,
                                'controller' => $kc,
                                'action'     => $action,
                                'remark'     => self::formatControllerName($kc),
                                'status'     => Yii::$app->params['default-permission'],

                        ];
                    }
                    // print_r($action);

                }

            }
        }
        return ArrayHelper::toArray($permissions);
    }

    public static function setPermissions($permissions = []) {
        if (empty($permissions)) {
            $permissions = self::generatePermissions();
        }
        $model = Permissions::findOne('id = 1');

        if (empty($model)) {
            $model = new Permissions();
        }
        else {
            $model->updated_by = Yii::$app->user->identity->id;
            $model->updated_on = date('Y-m-d H:i:s');
        }

        $model->permissions = Misc::json_encode($permissions);
        $model->created_by = Yii::$app->user->identity->id;

        if (!($model->validate())) {
            print_r($model->getErrors());
            die;

        }
        if ($model->save() != false) {
            return true;
        };
        return false;
    }


}