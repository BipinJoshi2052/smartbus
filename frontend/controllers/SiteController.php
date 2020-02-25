<?php

namespace frontend\controllers;

use common\components\HelperBlog;
use common\components\HelperMessages;
use common\components\HelperNews;
use common\components\HelperTestimonails;
use common\components\Misc;
use common\models\LoginForm;
use common\models\Sections;
use frontend\models\ContactForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller {
    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return ['access' => ['class' => AccessControl::className(), 'only' => ['logout', 'signup'], 'rules' => [['actions' => ['signup'], 'allow' => true, 'roles' => ['?'],], ['actions' => ['logout'], 'allow' => true, 'roles' => ['@'],],],], 'verbs' => ['class' => VerbFilter::className(), 'actions' => [//                        'logout' => ['post'],
        ],],];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeAction($action) {
        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
                'error'   => [
                        'class' => 'yii\web\ErrorAction',
                ],
                'captcha' => [
                        'class'           => 'yii\captcha\CaptchaAction',
                        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                ],
                'auth'    => [
                        'class'           => 'yii\authclient\AuthAction',
                        'successCallback' => [$this, 'onAuthSuccess'],
                ],
        ];
    }


    public function onAuthSuccess($client) {
        $userAttributes = $client->getUserAttributes();


        echo '<pre>';
        print_r($userAttributes);
        echo '</pre>';
        die;
        // (new \Swift_Transport_Esmtp_AuthHandler($client))->handle();
    }

    /**
     * Displays homepage.
     * @return mixed
     */
    public function actionIndex() {
        $page = 'home';


        return $this->render('index', [
                'blog'        => HelperBlog::getSiteBlog(),
                'testimonial' => HelperTestimonails::getTestimonial(),
                'news'=>HelperNews::getSiteNews()
        ]);
    }

    public function actionAbout() {
        $page = 'about';
        return $this->render('about');
    }

    public function actionServices() {
        $page = 'services';
        return $this->render('services');
    }


    public function actionFaq() {
        $page = 'faq';
        return $this->render('faq');
    }

    public function actionTerms() {
        $page = 'terms';
        return $this->render('terms');
    }

    public function actionPrivacy() {
        $page = 'privacy';
        return $this->render('privacy');
    }

    public function actionCareers() {
        $page = 'team';
        return $this->render('careers');
    }

    public function actionContact() {
        $page = 'contact';
        return $this->render('contact');
    }


    public function actionMessage() {
        $post = $_POST['post'];
        $message = HelperMessages::update($post);
        if($message != false) {
            Misc::setFlash('success', 'Your Message has been sent.');
        }else{
            Misc::setFlash('success', 'An Error Occured while sending message.');
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/site/contact/');
    }

    public function actionRegisterVendor() {

        return $this->render('careers');
    }


    /**
     * Logs in a user.
     * @return mixed
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        else {
            $model->password = '';

            return $this->render('login', ['model' => $model,]);
        }
    }

    /**
     * Logs out the current user.
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->redirect(Yii::$app->request->baseUrl);
    }

    /**
     * Displays contact page.
     * @return mixed
     */
//    public function actionContact() {
//        $page = 'contact';
//
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
//                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
//            }
//            else {
//                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
//            }
//
//            return $this->refresh();
//        }
//        else {
//            return $this->render('contact', ['model' => $model, 'content' => Sections::find()
//                                                                                     ->where(['=', 'page', $page])
//                                                                                     ->orderBy(['section_order' => SORT_ASC, 'created_on' => SORT_ASC])
//                                                                                     ->all(), 'page' => Yii::$app->params['pages'][$page],]);
//        }
//    }


    /**
     * Signs user up.
     * @return mixed
     */
    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()
                             ->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', ['model' => $model,]);
    }

    /**
     * Requests password reset.
     * @return mixed
     */
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

    public function actionReviewVehicle() {

        return $this->render('review-vehicle');
    }
}
