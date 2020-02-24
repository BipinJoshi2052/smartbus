<?php

namespace backend\controllers;

use common\components\Helper;
use common\models\VerificationActions;
use common\components\Verification;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\components\HelperClients;
use common\components\Misc;
use common\models\Clients;
use Yii;


/**
 * Clients controller
 */
class VerifyController extends Controller {
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
    //verify actions
    public function actionAction() {
        $actions = Verification::getActions();
        return $this->render('actions/index', [
                'actions' => $actions,
        ]);
    }
    public function actionViewAction($id) {
        $id = Misc::decrypt($id);
        $actions = Verification::getSingleAction($id);
        return $this->render('actions/view', ['actions' => $actions]);
    }

    public function actionPost() {
        if (isset($_POST['post'])) {
            $verify = Verification::verifyAction($_POST['post']);
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/verify/view-action/' . Misc::encrypt($verify));
    }

//    public function actionActions($id = '') {
//        $id = Misc::decrypt($id);
//        if ($id > 0) {
//            echo '0ne';
//        }
//        else {
//            echo 'all';
//        }
//        return;
//    }
    //verify actions
    //verify comments

    //verify comments
    public function actionComments() {
        $actions = Verification::getComments();
        return $this->render('comments/index', [
                'actions' => $actions,
        ]);
    }
    public function actionViewComment($id) {
        $id = Misc::decrypt($id);
        $actions = Verification::getSingleComment($id);
        return $this->render('comments/view', ['actions' => $actions]);
    }
    public function actionPostComment() {
        if (isset($_POST['post'])) {
            $verify = Verification::verifyComment($_POST['post']);
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/verify/view-comment/' . Misc::encrypt($verify));
    }
    //verify comments

    //client
    public function actionUpdate() {
        $image = (isset($_FILES['image'])) ? $_FILES['image'] : [];

        if (isset($_POST['client'])) {
            $updated = HelperClients::set($_POST['client'], $image);
            if ($updated != false) {
                Misc::setFlash('success', 'Client Updated.');
            }
        }

        return $this->redirect(Yii::$app->request->baseUrl . '/clients/');
    }
    //client

}
