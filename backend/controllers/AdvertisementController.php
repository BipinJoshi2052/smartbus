<?php

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperAdd;
use common\components\HelperBlog;
use common\components\HelperBlogCategories;
use common\components\Misc;
use common\models\Blog;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


/**
 * Clients controller
 */
class AdvertisementController extends Controller {
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
                                    //                            'actions' => ['logout', 'index'], // Enable for access
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
     * @return string
     */
    public function actionIndex() {
        $page = 'blog';
        return $this->render('index', [
                'add' => HelperAdd::getAdd(),
                'page' => Yii::$app->params['pages'][$page],
        ]);
    }

    public function actionPost($id = '') {
        $post = [];
        if ($id != '') {
            $id = Misc::decrypt($id);
            $post = HelperAdd::getSingleAdd($id);
        }
        return $this->render('form', [
                'editable' => $post,
        ]);
    }

    public function actionUpdate() {
        $image = (isset($_FILES['image'])) ? $_FILES['image'] : [];
        if (isset($_POST['post'])) {
            $update = HelperAdd::setAdd($_POST['post'], $image);
            return $this->redirect(Yii::$app->request->baseUrl . '/advertisement/post/'.Misc::encrypt($update));
        }

        return $this->redirect(Yii::$app->request->baseUrl . '/advertisement/');
    }
    public function actionDelete()
    {

        if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
            return HelperAdd::deleteAdd($_POST['id']);
        }

    }
    public function actionStatus()
    {
        $post= Yii::$app->request->post();
        if(isset($post['active'] )) {
            $change  = HelperAdd::Status($post['add']);
            $change['is_active'] = 0;
            HelperAdd::setStatus($change);
        }
        else {
            $change  =  HelperAdd::Status($post['add']);
            $change['is_active'] = 1;
            HelperAdd::setStatus($change);
        }

        $page = 'blog';
        $this->redirect(Yii::$app->request->baseUrl . '/advertisement/');
    }

}
