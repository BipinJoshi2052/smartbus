<?php

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperSettings;
use common\components\Misc;
use common\models\Settings;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


/**
 * Settings controller
 */
class SettingsController extends Controller {
    public $permissions;


    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
                'access' => [
                        'class' => AccessControl::className(),
                        'rules' => [
                                [
                                        'actions' => ['login', 'error'],
                                        'allow'   => true,
                                ],
                                [
                                    //                            'actions' => ['logout', 'index'],
                                    'allow' => true,
                                    'roles' => ['@'],
                                ],
                        ],
                ],
                'verbs'  => [
                        'class'   => VerbFilter::className(),
                        'actions' => [
                            //                    'logout' => ['post'],
                        ],
                ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeAction($action) {
        if ($action->id == 'error') {
            $this->layout = 'error';
        }
        $this->permissions = Helper::checkAuthority(Yii::$app->controller->id, Yii::$app->controller->action->id);


        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
                'error' => [
                        'class'  => 'yii\web\ErrorAction',
                        'layout' => 'error',
                ],
        ];
    }

    /**
     * Displays homepage.
     * @return string
     */
    public function actionIndex($id = '') {
        $id = Misc::decrypt($id);
        $settings = Settings::getSettings();
        return $this->render('index', [
                'settings' => $settings,
                'editable' => ($id > 0) ? Settings::findOne($id) : false,
        ]);
    }


    public function actionUpdate() {
        if (isset($_POST['setting'])) {
            $updated = HelperSettings::set($_POST['setting']);
            if ($updated == false) {
                Misc::setFlash('error', 'Setting Not Updated.');
                // return $this->redirect(Yii::$app->request->baseUrl . '/settings/edit/'. Misc::encrypt($updated['id']));
            }
            else {
                Misc::setFlash('success', 'Setting Updated.');
            }
        }

        return $this->redirect(Yii::$app->request->baseUrl . '/settings/edit/'.Misc::encrypt($updated));
    }
}
