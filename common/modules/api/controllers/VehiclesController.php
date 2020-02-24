<?php

namespace common\modules\api\controllers;

use common\components\Helper;
use common\modules\models\Vehicles;
use yii\web\Response;

class VehiclesController extends \yii\web\Controller {
    public $enableCsrfValidation = false;
    Const APPLICATION_ID = 'ASCCPE';
    private $format = 'json';
    private $post;

    public function beforeAction($action) {
        if ($action->id == 'error') {
            $this->layout = 'error';
        }
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }

    public function actionIndex() {
        return Helper::getAll('Vehicles');
//        return $this->goHome();
    }

    public function actionRetrieve() {
        $o = json_decode(\Yii::$app->request->post());
        if ($o->id) {

        }
        else {
            return ['status' => true, 'data' => 'Improper Request'];
        }
    }

    public function actionUpdate() {
        $y = new Vehicles();
        $y->scenario = Vehicles::SCENARIO_CREATE;
        $o = json_decode(\Yii::$app->request->post());
        $y->attributes = $o;
        if ($y->validate() && $y->save()) {
            return ['status' => true, 'data' => 'Vehicle Created'];
        }
        else {
            return ['status' => false, 'data' => $y->getErrors()];
        }
    }

    public function actionDelete() {
        $y = new Vehicles();
        $y->scenario = Vehicles::SCENARIO_CREATE;
        $o = json_decode(\Yii::$app->request->post());
        $y->attributes = $o;
        if ($y->validate() && $y->save()) {
            return ['status' => true, 'data' => 'Vehicle Created'];
        }
        else {
            return ['status' => false, 'data' => $y->getErrors()];
        }
    }

}
