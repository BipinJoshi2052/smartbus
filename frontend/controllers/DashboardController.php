<?php

namespace frontend\controllers;

use common\components\Helper;
use common\components\HelperBlog;
use common\components\HelperUpload;
use common\components\HelperUser;
use common\components\Misc;
use common\models\Blog;
use common\models\LoginForm;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\data\Pagination;

/**
 * Search controller
 */
class DashboardController extends Controller {

    public function behaviors() {
        return [];
    }

    public function actions() {
        return ['error' => ['class' => 'yii\web\ErrorAction',], 'captcha' => ['class' => 'yii\captcha\CaptchaAction', 'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,],];
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        if ($action->id == 'error') {
            $this->layout = 'error';
        }
        return parent::beforeAction($action);
    }
    public function actionIndex()
    {
        $id=Yii::$app->user->identity->id;
        return $this->render('index',[
                'details'=>HelperUser::getSingleUserDetails($id)
        ]);
    }
    public function actionEdit()
    {
        $id=Yii::$app->user->identity->id;
        return $this->render('edit',[
                'editable'=>HelperUser::getSingleUserDetails($id)
        ]);
    }
    public function actionReset()
    {
        $id=Yii::$app->user->identity->id;
        return $this->render('changepassword',[
                'details'=>HelperUser::getSingleUserDetails($id)
        ]);

    }
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }
            else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', ['model' => $model,]);
    }

    /**
     * Resets password.
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', ['model' => $model,]);
    }


    public function actionUpdateImage() {
        $user_id = Yii::$app->session->id;
        if(isset($_FILES["file"]))
        {
                return json_encode(true);
         }
        return json_encode(false);

    }

    public function actionUpdate($id = '') {
        if (isset($_POST['post'])) {
            $dashboard = Helper::setDashboard($_POST['post']);
            if ($dashboard != false) {
                Misc::setFlash('success', 'Your Comment has been sent for verification.');
            }
                else {
                    Misc::setFlash('success', 'Your Comment has been Posted.');
                }
                return $this->redirect(Yii::$app->request->baseUrl . '/dashboard/edit/');
            }
        }

}
//    public function actionIndex() {
//        $query = Blog::find()->where(['is_active' => 1]);
//        $countQuery = clone $query;
//        $pages = new Pagination(['totalCount' => $countQuery->count()]);
//        $models = $query->offset($pages->offset)
//                        ->limit($pages->limit)
//                        ->all();
//
//        return $this->render('index', [
//                'models' => $models,
//                'pages'  => $pages,
//        ]);
//    }
//
//    public function actionView($id = '') {
//
//        if ($id != '') {
//            $id = Misc::decrypt($id);
//            return $this->render('single', [
//                    'post'       => HelperBlog::getSingleBlogUser($id),
//                    'categories' => HelperBlog::getCategories(),]);
//        }
//        return $this->render('single', ['post' => HelperBlog::getSingleBlog($id)]);
//    }
//

//}
