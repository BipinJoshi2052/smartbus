<?php

namespace backend\controllers;

use common\components\Helper;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\components\HelperExplore;
use common\components\Misc;
use common\models\Explore;
use Yii;


class ExploreController extends Controller {
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
                'all'           => HelperExplore::getAll(),
                'editable'      => HelperExplore::getOne( $id),
                //                'is_authorized' => in_array('update', $this->permissions)
        ]);

    }
    public function actionUpdate() {
        $image = (isset($_FILES['image'])) ? $_FILES['image'] : [];

        if (isset($_POST['post'])) {
            $added = HelperExplore::setExplore($_POST['post'], $image);
            if ($added != false) {
                return $this->redirect(Yii::$app->request->baseUrl . '/explore/edit/' . Misc::encrypt($added));
            }
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/explore/edit/' . Misc::encrypt($added));
    }
}