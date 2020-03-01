<?php

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperBlog;
use common\components\HelperBlogCategories;
use common\components\HelperBlogComments;
use common\components\HelperCareers;
use common\components\Misc;
use common\models\Blog;
use common\models\Careers;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


/**
 * Clients controller
 */
class CareersController extends Controller {
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

        return $this->render('vacancy/index', [
                'vacancy'=>HelperCareers::getVacancy(),

        ]);
    }

    public function actionViewApplicants() {
      $applicants = HelperCareers::getApplicants();
        return $this->render('applicants', [
                'applicants' =>$applicants,
                'count'    => HelperCareers::getCount(),
        ]);
    }

        public function actionView($id = '') {
        $post = [];
        if ($id != '') {
            $id = Misc::decrypt($id);
            $view = HelperCareers::getSingleApplicants($id);

        }
        return $this->render('view', [
                'view' => $view,

        ]);
    }

    public function actionPost($id = '') {
        $post = [];
        if ($id != '') {
            $id = Misc::decrypt($id);
            $post = HelperCareers::getSingle($id);
        }
        return $this->render('vacancy/form', [

                'editable' => $post,
        ]);
    }
    public function actionPdf($id) {
        $model = Careers::findOne($id);

        // This will need to be the path relative to the root of your app.
        $filePath ='/../common/assets/files/uploads';

        // Might need to change '@app' for another alias
        $completePath = Yii::getAlias('@app'.$filePath.'/'.$model->file);

        return Yii::$app->response->sendFile($completePath, $model->file);
    }
//    public function actionComment() {
//        if (isset($_POST['post'])) {
//            $comment =  HelperBlog::setBlogComments($_POST['post']);
//            if ($comment != false) {
//                if($comment['role']!=1) {
//                    Misc::setFlash('success', 'Your Comment has been sent for verification.');
//                }else{
//                    Misc::setFlash('success', 'Your Comment has been Posted.');
//                }
//                return $this->redirect(Yii::$app->request->baseUrl . '/blog/view/' .Misc::encrypt($comment['blog_id']));
//            }
//        }
//        return $this->redirect(Yii::$app->request->baseUrl . '/blog/');
//    }

    public function actionUpdate() {
        if (isset($_POST['post'])) {
            $added = HelperCareers::setVacancy($_POST['post']);
            if ($added != false) {
                return $this->redirect(Yii::$app->request->baseUrl . '/careers/post/');
            }
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/careers/');
    }

    public function actionDelete() {
        if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
            return HelperCareers::deleteVacancy($_POST['id']);
        }
    }
//    //Blog category section
//    public function  actionCategories()
//    {
//        return $this->render('category/viewCat',array(
//                'BlogCat'=> HelperBlog::getBlogCategories(),
//        ));
//    }
//    public function actionDeleteBlogCategory()
//    {
//        if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
//            return HelperBlog::deleteBlogCategory($_POST['id']);
//        }
//
//    }
//    public function  actionList()
//    {
//        return $this->render('category/category');
//    }
//    public function actionUpdateCategory()
//    {
//        $update = HelperBlog::setCat($_POST['post']);
//        $this->redirect(Yii::$app->request->baseUrl . '/blog/edit-category/'.Misc::encrypt($update));
//
//    }
//    public function actionEditCategory($id = '') {
//
//        $post = [];
//        if ($id != '') {
//            $id = Misc::decrypt($id);
//            $post = HelperBlog::getSingleCat($id);
//        }
//        return $this->render('category/category', [
//
//                'editable' => $post,
//        ]);
//    }
    public function actionStatus()
    {
        $post= Yii::$app->request->post();
        if(isset($post['active'] )) {
            $change  = HelperCareers::Status($post['vacancy']);
            $change['is_active'] = 0;
            HelperCareers::setStatus($change);
        }
        else {
            $change  = HelperCareers::Status($post['vacancy']);
            $change['is_active'] = 1;
            HelperCareers::setStatus($change);
        }

        $this->redirect(Yii::$app->request->baseUrl . '/careers/');
    }

}
