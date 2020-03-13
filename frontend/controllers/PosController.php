<?php

namespace frontend\controllers;

use common\components\Helper;
use \common\components\HelperAPI;
use common\components\Misc;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\components\Curl;


/**
 * Clients controller
 */
class PosController extends \common\controllers\PosController {
    public function getViewPath() {
        return '@common/views/pos';
    }
    public function actionIndex() {
        $g = Yii::$app->request->get();
        $p = Yii::$app->request->post();
        if (!empty($g)) {
            $post = $g;
        }
        elseif ($p) {
            $post = $p;
        }
        else {
            $post = [];
        }

        if (isset($post['from']) && $post['from'] != '' && isset($post['to']) && $post['to'] != '') {
            if (isset($post[Yii::$app->request->csrfParam])) {
                unset($post[Yii::$app->request->csrfParam]);
            }
            $curl = new Curl();
            $schedules = $curl->setOption(
                    CURLOPT_POSTFIELDS, ['post' => Misc::json_encode($post)])
                              ->post(Yii::$app->params['api_path'] . '/search/tickets');

            if (!empty($schedules)) {
                $f = $curl->setOption(
                        CURLOPT_POSTFIELDS, ['post' => Misc::json_encode($post)])
                          ->post(Yii::$app->params['api_path'] . '/search/pos-filters');

                if ($f != '') {
                    $filters = Misc::json_decode($f);
                }
            }

        }
        return $this->render('index', [
                'schedules' => (isset($schedules) && $schedules != '') ? Misc::json_decode($schedules, true) : [],
                'search'    => (!empty($post)) ? $post : [],
                'filters'   => (isset($filters)) ? $filters : []
        ]);
    }
public function actionSwap()
{

}


}
