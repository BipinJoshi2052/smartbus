<?php
    /*
     * @author Chetan Rajbhandari
     */
    namespace frontend\controllers;

    use common\models\LoginForm;
    use common\models\User;
    use frontend\models\PasswordResetRequestForm;
    use Yii;
    use yii\web\Controller;

    /**
     * Search controller
     */
    class VendorController extends Controller {
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
               return $this->render('index');
        }
    }
