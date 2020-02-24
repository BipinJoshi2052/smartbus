<?php

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperBlog;
use common\components\HelperBlogCategories;
use common\components\HelperBlogComments;
use common\components\Misc;
use common\models\Blog;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


/**
 * Clients controller
 */
class ViewBlogsController extends Controller {
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
                                        'actions' => ['update','blog'],
                                        'allow'   => true,
                                        'roles' => ['?'],
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
//        $this->permissions = Helper::checkAuthority(Yii::$app->controller->id, Yii::$app->controller->action->id);


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
                'blog' => HelperBlog::getBlog(),
                'page' => Yii::$app->params['pages'][$page],
        ]);
    }

    public function actionBlog($id = '') {
        $post = [];
        if ($id != '') {
            $id = Misc::decrypt($id);
            $post = HelperBlog::getSingleBlog($id);

        }
        return $this->render('blog-detail', [
                'categories' => HelperBlogCategories::getCategories(),
                'editable' => $post,
        ]);
    }
    public function actionUpdate( ) {
             $data = Yii::$app->request->post();
             HelperBlogComments::setBlogComments($data);
            return $this->render('index', [
                    'blog' => HelperBlog::getBlog(),
            ]);
    }

//    public function actionUpdate() {
//        $image = (isset($_FILES['image'])) ? $_FILES['image'] : [];
//        if (isset($_POST['post'])) {
//            $added = HelperBlog::setBlog($_POST['post'], $image);
////            echo '<pre>';
////            print_r($added);
////            echo '</pre>';
//            if ($added != false) {
//                return $this->redirect(Yii::$app->request->baseUrl . '/blog/post/' . Misc::encrypt($added));
////                return $this->redirect(Yii::$app->request->baseUrl . '/blog/');
//            }
//        }
//        return $this->redirect(Yii::$app->request->baseUrl . '/blog/');
//    }
    public function actionDelete() {
        if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
            return HelperBlog::deleteBlog($_POST['id']);
        }
    }


}
