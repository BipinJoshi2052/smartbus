<?php

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperUser;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\components\Misc;
use Yii;


/**
 * Amenities controller
 */
class AmenitiesController extends Controller {
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
     * Displays homepage.
     * @return string
     */
    public function actionIndex($id = '') {
        $id = Misc::decrypt($id);
        $d = Yii::$app->user->id;
        return $this->render('index', [
                'all'           => Helper::getAll('Amenities'),
                'editable'      => Helper::getOne('Amenities', $id),
                'history'=>HelperUser::getUserHistory($d),
//                'is_authorized' => in_array('update', $this->permissions)
        ]);
    }

    public function actionUpdate() {
        if (isset($_POST['post'])) {
            $updated = Helper::setAmenity('amenities', $_POST['post']);
            if ($updated['response'] != false) {
                if($updated['verification_status']>0) {
                    Misc::setFlash('success', 'Amenity updated');
                }else{
                Misc::setFlash('success', 'Amenity updated but will not show until it is verified, Unless you are the Admin');
                }
            }
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/amenities/');
    }
}
