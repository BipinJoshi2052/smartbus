<?php
    /*
     * @author Chetan Rajbhandari
     */
    namespace frontend\controllers;

    use common\components\HelperUser;
    use common\models\LoginForm;
    use common\models\User;
    use frontend\models\PasswordResetRequestForm;
    use Yii;
    use yii\web\Controller;

    /**
     * Search controller
     */
    class RegisterController extends Controller {

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
               return $this->render('vendor');
        }

            /**
         * Displays homepage.
         * @return mixed
         */
        public function actionAgent() {
               return $this->render('agent');
        }
        public function actionInsert(){
            $data = Yii::$app->request->post();
            $post = HelperUser::addUser($data);
            return $this->redirect(Yii::$app->request->baseUrl);

        }
    }
