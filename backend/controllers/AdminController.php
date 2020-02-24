<?php

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperSettings as HSettings;
use common\components\HelperUser as HUser;
use common\components\Misc;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


/**
 * Clients controller
 */
class AdminController extends Controller {
    public $permissions;

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
                'access' => [
                        'class' => AccessControl::className(),
                        'rules' => [
                                [
                                        'actions' => ['login', 'error'],
                                        'allow'   => true,
                                ],
                                [
                                    //                            'actions' => ['logout', 'index'],
                                    'allow' => true,
                                    'roles' => ['@'],
                                ],
                        ],
                ],
                'verbs'  => [
                        'class'   => VerbFilter::className(),
                        'actions' => [
                            //                    'logout' => ['post'],
                        ],
                ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeAction($action) {
        if ($action->id == 'error') {
            $this->layout = 'error';
        }
        $this->permissions = Helper::checkAuthority(Yii::$app->controller->id, Yii::$app->controller->action->id);


        return parent::beforeAction($action);
    }


    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
                'error' => [
                        'class'  => 'yii\web\ErrorAction',
                        'layout' => 'error',
                ],
        ];
    }

    /**
     * Displays homepage.
     * @return string
     */
    public function actionIndex() {
        $user = Misc::exists(HUser::getUser('id', Yii::$app->user->identity->id), '');

        return $this->render('index', [
                'user' => $user,
        ]);
    }

    public function actionProfile() {
        $user = Misc::exists(HUser::getUser('id', Yii::$app->user->identity->id), '');
        return $this->render('profile', ['user' => $user]);
    }

    public function actionEditProfile() {
        $user = Misc::exists(HUser::getUser('id', Yii::$app->user->identity->id), '');
        return $this->render('edit', ['user' => $user]);
    }

    public function actionChangePassword() {
        $disclaimer = Misc::exists(HSettings::getSetting('slug', 'change-password-disclaimer'), '');
        return $this->render('change_password', ['disclaimer' => $disclaimer]);
    }

    public function actionChangeProfilePicture() {
        $image = Misc::exists(HUser::getUser('id', Yii::$app->user->identity->id), '');
        return $this->render('change_profile_picture', ['image' => $image]);
    }

}
