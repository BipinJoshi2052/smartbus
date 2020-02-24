<?php

namespace frontend\controllers;

use common\models\LoginForm;
use common\models\Sections;
use frontend\models\ContactForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

/**
 * Site controller
 */
class DesignController extends Controller {
    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return ['access' => ['class' => AccessControl::className(), 'only' => ['logout', 'signup'], 'rules' => [['actions' => ['signup'], 'allow' => true, 'roles' => ['?'],], ['actions' => ['logout'], 'allow' => true, 'roles' => ['@'],],],], 'verbs' => ['class' => VerbFilter::className(), 'actions' => [//                        'logout' => ['post'],
        ],],];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeAction($action) {
        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
                'error'   => [
                        'class' => 'yii\web\ErrorAction',
                ],
                'captcha' => [
                        'class'           => 'yii\captcha\CaptchaAction',
                        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                ],
                'auth'    => [
                        'class'           => 'yii\authclient\AuthAction',
                        'successCallback' => [$this, 'onAuthSuccess'],
                ],
        ];
    }


    /**
     * Displays homepage.
     * @return mixed
     */
    public function actionIndex() {

        return $this->render('index');
    }

    public function actionSearch() {

        return $this->render('search');
    }

   
}
