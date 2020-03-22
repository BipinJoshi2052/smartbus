<?php

namespace frontend\controllers;

use common\components\Helper;
use common\components\AuthHandler;
use common\components\HelperAdd;
use common\components\HelperBlog;
use common\components\HelperCareers;
use common\components\HelperClients;
use common\components\HelperExplore;
use common\components\HelperFaq;
use common\components\HelperMessages;
use common\components\HelperNews;
use common\components\HelperPrivacy;
use common\components\HelperSlider;
use common\components\HelperTerms;
use common\components\HelperTestimonails;
use common\components\HelperUser;
use common\components\Misc;
use common\components\Query;
use common\models\Bookings;
use common\models\generated\Careers;
use common\models\LoginForm;
use common\models\LoginSocial;
use common\models\Messages;
use common\models\Sections;
use common\models\Settings;
use common\models\User;
use frontend\models\ContactForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use phpDocumentor\Reflection\Type;
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

    public function behaviors() {
        return [
                'access' =>
                        [
                                'class' => AccessControl::className(),
                                'only'  => [
                                        'logout', 'signup'
                                ],
                                'rules' => [
                                        [
                                                'actions' => ['signup'],
                                                'allow'   => true,
                                                'roles'   => ['?'],
                                        ],
                                        [
                                                'actions' => ['logout'],
                                                'allow'   => true,
                                                'roles'   => ['@'],
                                        ],
                                ],
                        ],
                'verbs'  => [
                        'class'   => VerbFilter::className(),
                        'actions' => [//'logout' => ['post'],
                        ],
                ],
        ];
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

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
        (new AuthHandler($client))->handle($client);
        // (new \Swift_Transport_Esmtp_AuthHandler($client))->handle();
    }

    public function actionIndex() {
        $page = 'home';
        //        die;
        return $this->render('index', [
                'blog'        => HelperBlog::getSiteBlog(),
                'faq'         => HelperFaq::getSiteFaq(),
                'testimonial' => HelperTestimonails::getTestimonial(),
                'news'        => HelperNews::getSiteNews(),
                'explore'     => HelperExplore::getSiteExplore(),
                'clients'     => HelperClients::getClients(),
                'slider'      => HelperSlider::getSlider(),
        ]);
    }
    public function actionIndex3() {
        $page = 'home';
        //        die;
        return $this->render('index3', [
                'blog'        => HelperBlog::getSiteBlog(),
                'faq'         => HelperFaq::getSiteFaq(),
                'testimonial' => HelperTestimonails::getTestimonial(),
                'news'        => HelperNews::getSiteNews(),
                'explore'     => HelperExplore::getSiteExplore(),
                'clients'     => HelperClients::getClients(),
                'slider'      => HelperSlider::getSlider(),
        ]);
    }
    public function actionPartner($id = '') {
        if ($id != '') {
            $id = Misc::decrypt($id);
            $post = HelperClients::getClientsPage($id);
        }
        return $this->render('/partner/index.php', [
                'client' => $post,

        ]);
    }

    public function actionAbout() {
        $page = 'about';
        $settings = Settings::getSettings();
        return $this->render('about', [
                'settings' => $settings,
        ]);
    }

    public function actionServices() {
        $page = 'services';
        return $this->render('services');
    }

    public function actionFaq() {
        $page = 'faq';
        return $this->render('faq',[
                'faq'=>HelperFaq::getAll(),
        ]);
    }

    public function actionTerms() {
        $page = 'terms';
        return $this->render('terms', [
                'terms' => HelperTerms::getAllTerms(),
        ]);
    }


    public function actionPrivacy() {
        $page = 'privacy';
        return $this->render('privacy', [
                'privacy' => HelperPrivacy::getAllPrivacy(),
        ]);
    }

    public function actionCareers() {
        if (isset($_POST['post'])) {
            $r = HelperCareers::setApplication($_POST['post'], (isset($_FILES['file']) && !empty($_FILES['file'])) ? $_FILES['file'] : '');
            return $this->render('careers', [
                    'careers'  => HelperCareers::getVacancy(),
                    'response' => $r,
            ]);
        }
        return $this->render('careers', [
                'careers' => HelperCareers::getVacancy(),
        ]);
    }


    public function actionContact() {
        $page = 'contact';
        return $this->render('contact');
    }

    public function actionSearch() {
        $booking[] = '';
        $booking = Bookings::find()
                ->with('schedule')
                           ->where(['like', 'booking_code', $_GET['search']['ticket_num']])
                           ->andWhere(['=', 'phone', $_GET['search']['phone']])
                           ->asArray()
                           ->all();
        return $this->render('search', [
                'details' => $booking,
                'add'=>HelperAdd::getRandomAdd(),
        ]);
    }
    public function actionMessage() {
        Yii::$app->controller->enableCsrfValidation = false;
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post('contact');

            $message = new Messages();
            $message->attributes = $post;
            if ($message->save()) {
                echo json_encode(true);
            }
            else {
                echo '<pre>';
                print_r($message);
            }
        }
    }

    public function actionRegisterVendor() {
        return $this->render('careers');
    }

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

    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->redirect(Yii::$app->request->baseUrl);
    }

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
    //    public function actionResetPassword($token) {
    //
    //        try {
    //            $model = new ResetPasswordForm($token);
    //        } catch (InvalidArgumentException $e) {
    //            throw new BadRequestHttpException($e->getMessage());
    //        }
    //
    //        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
    //            Yii::$app->session->setFlash('success', 'New password saved.');
    //
    //            return $this->goHome();
    //        }
    //
    //        return $this->render('resetPassword', ['model' => $model,]);
    //    }
    public function actionResetPassword() {

        return $this->render('resetPassword');

    }

    public function actionReset() {
        $post = Yii::$app->request->post();
        if ($post['email'] != '') {
            $model = User::findByEmail($post['email']);
            if ($model != '' && $model->username == $post['email']) {
                $response = HelperUser::resetPassword($model);
            }
            else {
                return $this->render('resetPassword', [
                        'editable' => $post['email'],
                        'error'    => 'user does not exist',


                ]);
            }
            return $this->render('resetPassword', [
                    'response' => $response,
                    'editable' => $post['email'],
            ]);
        }
    }

    public function actionResetFinal($id) {

        $user = User::findByPasswordResetToken($id);
        if (!empty($user)) {
            if ($user->validateResetPasswordToken($id)) {
                $model = new LoginSocial();
                $model->username = $user->username;
                $model->login();
                return $this->redirect(Yii::$app->request->baseUrl . '/dashboard/reset-by-email/');
            }
            else {
                echo 'sorry';
                die;
            }
        }
        else {
            return $this->redirect(Yii::$app->request->baseUrl);
        }

    }

    public function actionReviewVehicle() {

        return $this->render('review-vehicle');
    }

}
