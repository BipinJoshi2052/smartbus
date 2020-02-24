<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace backend\controllers;

use common\components\Helper;
use common\components\Misc;
use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class UsersController extends Controller {
    public $permissions;

    /**
     * @inheritdoc
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
                                    // 'actions' => ['logout', 'index'],
                                    'allow' => true,
                                    'roles' => ['@'],
                                ],
                        ],
                ],
                'verbs'  => [
                        'class'   => VerbFilter::className(),
                        'actions' => [
                            // 'logout' => ['post'],
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
     * @inheritdoc
     */
    public function actions() {
        return [
                'error' => [
                        'class' => 'yii\web\ErrorAction',
                ],
        ];
    }

    public function actionType($type = '') {
        if ($type == '' && !key_exists($type, Yii::$app->params['role_assoc'])) {
            $type = 'customer';
        };
        $users = User::find()
                     ->where(['=', 'role', Yii::$app->params['role_num'][$type]])
                     ->with('userDetails')
                     ->all();

        return $this->render('index', [
                'users'         => $users,
                'type'          => $type,
                'is_authorized' => (in_array('update', $this->permissions)) ? 1 : 0,
        ]);
    }

    public function actionCreate($type) {
        if ($type == '' && !key_exists($type, Yii::$app->params['role_assoc'])) {
            return $this->redirect(Yii::$app->request->baseUrl . 'users/type');
        };

        return $this->render('form', [
                'editable'      => [],
                'type'          => $type,
                'new'           => true,
                'is_authorized' => in_array('update', $this->permissions)
        ]);
    }

    public function actionEdit($id = '') {
        $id = Misc::decrypt($id);
        if ($id > 0) {
            $user = User::find()
                        ->where(['=', 'id', $id])
                        ->with('userDetails')
                        ->with('role')
                        ->one();

            if (empty($user)) {
                return $this->redirect(Yii::$app->request->baseUrl . '/users/type/');
            }

            $type = Yii::$app->params['role_assoc'][$user->role];

            return $this->render('form', [
                    'editable'      => $user,
                    'type'          => $type,
                    'new'           => false,
                    'is_authorized' => in_array('update', $this->permissions)
            ]);
        }
        return $this->redirect(Yii::$app->request->baseUrl . 'users/type');
    }

    public function actionUpdate() {
        $data = $post = Yii::$app->request->post();
        $image = (isset($_FILES['image'])) ? $_FILES['image'] : [];
        $user = Helper::setUser($data, $image);
        if ($user) {
            return $this->render('form', [
                    'editable'      => $user,
                    'type'          => Yii::$app->params['role_assoc'][$user->role],
                    'new'           => false,
                    'is_authorized' => in_array('update', $this->permissions)
            ]);
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/users/type');
    }
}
