<?php

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperAPI;
use common\components\Misc;
use common\models\LoginForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\BaseUrl;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller {
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
                            //             'logout' => ['post'],
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
        return $this->render('index', [
                'dashboard' => 'dash\_' . Yii::$app->params['role_assoc'][Yii::$app->user->identity->role],
                'data'      => [
                        'schedules' => Helper::getSchedules()
                ]
        ]);
    }

    /**
     * Login action.
     * @return string
     */
    public function actionLogin() {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        else {
            $model->password = '';

            return $this->render('login', [
                    'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     * @return string
     */
    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->goHome();
    }


    public function actionRemove() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if (Yii::$app->request->isAjax && $_POST['tab'] && $_POST['id']) {
            $model_name = 'common\models\\' . $_POST['tab'];
            $model = $model_name::findOne(Misc::decrypt($_POST['id']));
            if (isset($model->image) && $model->image != '') {
                if (Misc::delete_file($model->image, 'image')) {
                    $model->image = '';
                    if ($model->save() == true) {
                        return true;
                    }
                }
            }
            return true;
        }
        return false;
    }

    public function actionDeleteItem() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if ($_POST['id'] != '' && Misc::decrypt($_POST['id']) > 0 && $_POST['table'] != '') {
            $model_name = 'common\models\\' . $_POST['table'];
            $id = Misc::decrypt($_POST['id']);
            $model = $model_name::findOne($id);
            if ($model) {
                if (isset($model->image) && $model->image != '') {
                    Misc::delete_file($model->image, 'image');
                }
                if ($model->delete() == true) {
                    return true;
                }
            }
        }
        return false;
    }

    public function actionDeleteAll() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $_POST;
        if (Yii::$app->request->isAjax && $_POST['ids'] != '' && $_POST['table'] != '') {
            $ids = json_decode($_POST['ids']);
            print_r($ids);
            foreach ($ids as $k => $id) {
                $ids[$k] = Misc::decrypt($id);
            }
            $model_name = 'common\models\\' . $_POST['table'];
            $id = Misc::decrypt($_POST['ids']);
            $model = $model_name::find()
                                ->where(['in', 'id', $ids])
                                ->all();
            return $model;
            die;
            if ($model) {
                if (isset($model->image) && $model->image != '') {
                    Misc::delete_file($model->image, 'image');
                }
                if ($model->delete() == true) {
                    return true;
                }
            }
        }
        return false;
    }

    public function actionToggleStatus() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id = Misc::decrypt(Yii::$app->request->post('id'));
        $model = Misc::decrypt(Yii::$app->request->post('table'));
        if ($model != '' && intval($id) > 0) {
            $model = (Yii::$app->params['modelpath'] . $model)::findOne($id);
            $model->is_active = ($model->is_active == 1) ? 0 : 1;
            if ($model->save() != false) {
                return true;
            }
        }
        return false;
    }

    public static function actionUpdateAjax() {
        $data = Yii::$app->request->post();
        if (Yii::$app->request->isAjax && isset($data['post'])) {
            $updated = Helper::setAjaxData($data['post']);
            if ($updated != false) {
                return Misc::json_encode(true);
                //                Misc::setFlash('success', 'Permission Updated.');
            }
        }
        return Misc::json_encode(false);
    }
}
