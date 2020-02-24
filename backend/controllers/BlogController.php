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
class BlogController extends Controller {
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
                'blog' => HelperBlog::getBlog(),
                'page' => Yii::$app->params['pages'][$page],
        ]);
    }

    public function actionView($id = '') {
        $post = [];
        if ($id != '') {
            $id = Misc::decrypt($id);
            $post = HelperBlog::getSingleBlog($id);
        }
        return $this->render('view-blogs/blog-detail', [
                'categories' => HelperBlog::getCategories(),
                'editable' => $post,
        ]);
    }

    public function actionPost($id = '') {
        $post = [];
        if ($id != '') {
            $id = Misc::decrypt($id);
            $post = HelperBlog::getSingleBlog($id);
        }
        return $this->render('form', [
                'categories' => HelperBlog::getCategories(),
                'editable' => $post,
        ]);
    }

    public function actionComment() {
        if (isset($_POST['post'])) {
            $comment =  HelperBlog::setBlogComments($_POST['post']);
            if ($comment != false) {
//                echo '<pre>';
//                print_r($comment);
//                echo '</pre>';
//                die;
                if($comment['role']!=1) {
                    Misc::setFlash('success', 'Your Comment has been sent for verification.');
                }else{
                    Misc::setFlash('success', 'Your Comment has been Posted.');
                }
                return $this->redirect(Yii::$app->request->baseUrl . '/blog/view/' .Misc::encrypt($comment['blog_id']));
            }
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/blog/');
    }

    public function actionUpdate() {
        $image = (isset($_FILES['image'])) ? $_FILES['image'] : [];
        if (isset($_POST['post'])) {
            $added = HelperBlog::setBlog($_POST['post'], $image);
            if ($added != false) {
                return $this->redirect(Yii::$app->request->baseUrl . '/blog/post/' . Misc::encrypt($added));
            }
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/blog/');
    }

    public function actionDelete() {
        if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
            return HelperBlog::deleteBlog($_POST['id']);
        }
    }
    //Blog category section
    public function  actionCategories()
    {
        return $this->render('category/viewCat',array(
                'BlogCat'=> HelperBlog::getBlogCategories(),
        ));
    }
    public function actionDeleteBlogCategory()
    {
        if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
            return HelperBlog::deleteBlogCategory($_POST['id']);
        }

    }
    public function  actionList()
    {
        return $this->render('category/category');
    }
    public function actionUpdateCategory()
    {
        $update = HelperBlog::setCat($_POST['post']);
        $this->redirect(Yii::$app->request->baseUrl . '/blog/edit-category/'.Misc::encrypt($update));

    }
    public function actionEditCategory($id = '') {

        $post = [];
        if ($id != '') {
            $id = Misc::decrypt($id);
            $post = HelperBlog::getSingleCat($id);
        }
        return $this->render('category/category', [

                'editable' => $post,
        ]);
    }

}
