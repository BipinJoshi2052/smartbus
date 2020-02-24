<?php

    namespace common\modules\api\controllers;

    use common\modules\models\Bookings;
    use yii\web\Response;

    class BookController extends \yii\web\Controller {
        public $enableCsrfValidation = FALSE;

        public function actionIndex() {
            return $this->render('index');
        }

        public function actionCreateBooking() {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $booking = new Bookings();
            $booking->scenario = Bookings::SCENARIO_CREATE;
            $booking->attributes = \Yii::$app->request->post();
            if ($booking->validate()) {
                return ['status' => TRUE, 'data' => 'Booking Created'];
            }
            else {
                return ['status' => FALSE, 'data' => $booking->getErrors()];
            }

        }

        public function actionSearchTicket() {


            //   return $this->render('index');
        }
    }
