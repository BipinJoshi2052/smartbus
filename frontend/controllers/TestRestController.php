<?php
    /*
     * @author Chetan Rajbhandari
     */
    namespace frontend\controllers;

    use yii\web\Controller;

    /**
     * Search controller
     */
    class TestRestController extends Controller {

        /**
         * @inheritdoc
         */
        public function behaviors() {
            return [];
        }

        /**
         * @inheritdoc
         */
        public function actions() {
            return ['error' => ['class' => 'yii\web\ErrorAction',], 'captcha' => ['class' => 'yii\captcha\CaptchaAction', 'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : NULL,],];
        }

        public function beforeAction($action) {
            if ($action->id == 'error') {
                $this->layout = 'error';
            }

            return parent::beforeAction($action);
        }

        /**
         * Displays homepage.
         * @return mixed
         */
        public function actionIndex() {
            $request = curl_init();
            $post = [
                'booking_code'   => 'asd',
                'booking_status' => '0',
            ];
            $post2 = [
            ];

            curl_setopt($request, CURLOPT_URL, 'http://localhost/smartbus/api/book/create-booking');
            curl_setopt($request, CURLOPT_FORBID_REUSE, FALSE);
            curl_setopt($request, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($request, CURLOPT_POST, count($post));
            curl_setopt($request, CURLOPT_POSTFIELDS, $post);
            $response = curl_exec($request);
            curl_close($request);
            print_r($response);

            return;
        }

    }
