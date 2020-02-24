<?php

namespace frontend\controllers;

use common\components\HelperBlog;
use common\components\Misc;
use common\models\Blog;
use common\models\LoginForm;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use Yii;
use yii\web\Controller;
use yii\data\Pagination;

/**
 * Search controller
 */
class BlogController extends Controller {

    public function behaviors() {
        return [];
    }

    public function actions() {
        return ['error' => ['class' => 'yii\web\ErrorAction',], 'captcha' => ['class' => 'yii\captcha\CaptchaAction', 'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,],];
    }

    public function beforeAction($action) {
        if ($action->id == 'error') {
            $this->layout = 'error';
        }
        return parent::beforeAction($action);
    }

    public function actionIndex() {
        $query = Blog::find()->where(['is_active' => 1]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();

        return $this->render('index', [
                'models' => $models,
                'pages'  => $pages,
        ]);
    }

    public function actionView($id = '') {

        if ($id != '') {
            $id = Misc::decrypt($id);
            return $this->render('single', [
                    'post'       => HelperBlog::getSingleBlogUser($id),
                    'categories' => HelperBlog::getCategories(),]);
        }
        return $this->render('single', ['post' => HelperBlog::getSingleBlog($id)]);
    }

    public function actionUpdate($id = '') {
        if (isset($_POST['post'])) {
            $comment = HelperBlog::setBlogComments($_POST['post']);
            if ($comment != false) {
                if ($comment['role'] != 1) {
                    Misc::setFlash('success', 'Your Comment has been sent for verification.');
                }
                else {
                    Misc::setFlash('success', 'Your Comment has been Posted.');
                }
                return $this->redirect(Yii::$app->request->baseUrl . '/blog/view/' . Misc::encrypt($comment['blog_id']));
            }
        }
        $blog = Yii::$app->request->post();
        $comments = HelperBlog::setComment($blog);
        return $this->render('single', [
                'post' => HelperBlog::getSingleBlogUser($blog['id'])
        ]);

    }
}
