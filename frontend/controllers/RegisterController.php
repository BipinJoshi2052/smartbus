<?php
/*
 * @author Chetan Rajbhandari
 */

namespace frontend\controllers;

use common\components\HelperUser;
use common\components\HelperRegister;
use common\components\Misc;
use common\models\generated\Auth;
use common\models\LoginForm;
use common\models\LoginSocial;
use common\models\Settings;
use common\models\User;
use yii\web\IdentityInterface;
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
        return ['error' => ['class' => 'yii\web\ErrorAction',], 'captcha' => ['class' => 'yii\captcha\CaptchaAction', 'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,],];
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

    public function actionInsert() {
        $data = Yii::$app->request->post();
        $post = HelperUser::addUser($data);
        return $this->redirect(Yii::$app->request->baseUrl . '/site/index');

    }

    public function actionValidate($id) {
        $user = User::findByEmailVerification($id);
        if (!empty($user)) {
            if ($user->validateEmailCode($id)) {
                $user->email_verified = 1;
                //   $user->email_verification='';
            }

            if ($user->save()) {
                $model = new LoginSocial();
                $model->username = $user->username;
                $model->login();

            }

        }
        return $this->redirect(Yii::$app->request->baseUrl);

    }


}
