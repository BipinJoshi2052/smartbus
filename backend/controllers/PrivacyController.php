<?php

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperBlog;
use common\components\HelperBlogCategories;
use common\components\HelperBlogComments;
use common\components\HelperPrivacy;
use common\components\Misc;
use common\models\Blog;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


/**
 * Clients controller
 */
class PrivacyController extends Controller {
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
        return $this->render('index', [
                'Privacy' => HelperPrivacy::getAllPrivacy(),
        ]);
    }

    public function actionView($id = '') {
        $id = Misc::decrypt($id);
        return $this->render('view', [
                'details' => HelperPrivacy::getSinglePrivacyDetails($id)
        ]);
    }

    public function actionPost($id = '') {
        if ($id != '') {
            $id = Misc::decrypt($id);
            $single = HelperPrivacy::getSinglePrivacyDetails($id);
            return $this->render('form', [
                    'editable' => $single,
            ]);
        }
        return $this->render('form');
    }

    public function actionUpdate() {
        $post = Yii::$app->request->post();

        $privacy = HelperPrivacy::addPrivacy($post);

        $this->redirect(Yii::$app->request->baseUrl . '/privacy/post/' . Misc::encrypt($privacy['id']));
    }
    public function actionDelete() {
                if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
                    return HelperPrivacy::deleteSection($_POST['id']);
                }
            }

}
