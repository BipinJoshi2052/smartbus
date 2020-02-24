<?php

namespace common\modules\api\controllers;

use common\components\Helper;
use common\components\Misc;
use common\models\User;
use common\modules\api\components\HelperAPI;

use common\modules\api\models\Bookings;
use yii\web\Response;

class BookController extends \yii\web\Controller {
    public $enableCsrfValidation = false;
    //  Const APPLICATION_ID = 'ASCCPE';
    private $format = 'json';

    /*   public function actionIndex() {
           return $this->render('index');
       }*/
    public function beforeAction($action) {
        if ($action->id == 'error') {
            $this->layout = 'error';
        }

        return parent::beforeAction($action);
    }

    public function actionRequestSchedule() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $post = \Yii::$app->request->post();

        if (isset($post['id']) && $post['id'] != '') {
            $id = Misc::decrypt($post['id']);
            //  return $id;
            if ($id > 0) {
                return HelperAPI::getSchedule($id);
            }
        }
        return [
                'error' => 'Invalid Request'
        ];
    }

    public function actionToggleSeat() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $seat = \Yii::$app->request->post('seat');

        if ((HelperAPI::toggleSeat($seat) === true)) {
            return ['status' => true, 'data' => 'Seat Data Updated'];
        };
        return ['status' => false, 'data' => 'Error, Data not updated'];
    }

    public function actionBookTicket() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $post = \Yii::$app->request->post('post');
        $data = Misc::json_decode($post);
        // print_r($data);
        if (!empty($data)) {
            return HelperAPI::bookTicket($data);
        }
        return [
                'status' => 'failed',
                'error'  => 'Invalid'
        ];
        //   print_r(Misc::getNextId('bookings'));
        //     print_r($data);


    }

    public function actionSearchTicket() {
        //   return $this->render('index');
    }
}
