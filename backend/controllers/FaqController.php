<?php

namespace backend\controllers;

use common\components\Helper;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\components\HelperFaq;
use common\components\Misc;
use common\models\Faq;
use Yii;


class FaqController extends Controller {
    public $permissions;

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
    public function actions() {
        return [
                'error' => [
                        'class'  => 'yii\web\ErrorAction',
                        'layout' => 'error',
                ],
        ];
    }
    public function beforeAction($action) {
        if ($action->id == 'error') {
            $this->layout = 'error';
        }
        $this->permissions = Helper::checkAuthority(Yii::$app->controller->id, Yii::$app->controller->action->id);


        return parent::beforeAction($action);
    }
    public function actionIndex($id='') {
        $id = Misc::decrypt($id);
        return $this->render('index', [
                'all'           => HelperFaq::getAll(),
                'editable'      => HelperFaq::getOne( $id),
                //                'is_authorized' => in_array('update', $this->permissions)
        ]);

    }
    public function actionUpdate() {
        if (isset($_POST['post'])) {
            $added = HelperFaq::setFaq($_POST['post']);
            if ($added != false) {
                return $this->redirect(Yii::$app->request->baseUrl . '/faq');
            }
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/faq');
    }

}