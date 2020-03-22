<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 * @author Chetan Rajbhandari
 */

namespace backend\controllers;

use common\components\Curl;
use common\components\HelperAPI;
use common\components\HelperRoutes;
use common\components\HelperVehicles;
use common\components\Misc;
use common\models\Locations;
use common\models\Schedules;
use common\models\Vehicles;
use common\models\VehicleTypes;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\components\Helper;
use yii\web\Response;

class BookingsController extends Controller {
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


    public function actionIndex($id = '') {
        $id = Misc::decrypt($id);
        $bookings = [];
        return $this->render('index', [
                'bookings' => $bookings,
        ]);
    }

    public function actionForm($id = '') {
        if ($id != '') {
            $id = Misc::decrypt($id);
        }

        return $this->render('form', [

                'editable' => ($id != '' && $id > 0) ? Schedules::findOne($id) : [],
        ]);
    }

    public function actionBookTicket() {

        //\Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax && Yii::$app->request->post('data')) {
            $data = Yii::$app->request->post('data');

            $data['token'] = Yii::$app->user->identity->getAuthKey();

            if (!empty($data)) {
                $curl = new Curl();
                $book = $curl->setOption(
                        CURLOPT_POSTFIELDS, ['post' => Misc::json_encode($data)])
                             ->post(Yii::$app->params['api_path'] . '/book/book-ticket');

                return ($book);
            }
        }

    }


}
