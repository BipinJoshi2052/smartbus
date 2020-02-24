<?php

namespace common\modules\api\controllers;

use common\components\Helper;
use common\components\Misc;
use common\modules\api\components\HelperAPI;
use common\modules\models\Bookings;
use common\modules\models\Schedules;
use yii\web\Response;
use Yii;

class ScheduleController extends \yii\web\Controller {
    public $enableCsrfValidation = false;
    Const APPLICATION_ID = 'ASCCPE';
    private $format = 'json';

    public function beforeAction($action) {
        if ($action->id == 'error') {
            $this->layout = 'error';
        }


        return parent::beforeAction($action);
    }

    public function actionIndex() {
        //    return $this->render('index');
    }

    public function actionUpdate() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();

        var_dump($data);die;
        if (isset($data['authentication']['username']) && ($data['authentication']['password']) && $data['authentication']['username'] != '' && $data['authentication']['password'] != '') {
            if (HelperAPI::checkUser($data['authentication']['username'], $data['authentication']['password'])) {
                return ['status' => true, 'success' => 'User Validated'];
            };
        }

        return ['status' => false, 'data' => 'User NOT Validated'];


        if (isset($data['schedule']['id']) && $data['schedule']['id'] > 0) {
            $schedules = Schedules::findOne($data['schedule']['id']);
            $schedules->scenario = $schedules::SCENARIO_UPDATE;
        }
        else {
            $schedules = new Schedules();
            $schedules->scenario = $schedules::SCENARIO_CREATE;
        }
        $schedules->attributes = $data['schedule'];

        if ($schedules->validate()) {
            return ['status' => true, 'data' => 'Schedule Created'];
        }
        else {
            return ['status' => false, 'data' => $schedules->getErrors()];
        }
    }

    public function actionSearchTicket() {
        //   return $this->render('index');
    }
}
