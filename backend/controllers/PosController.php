<?php

namespace backend\controllers;

use common\components\Helper;
use \common\components\HelperAPI;
use common\components\Misc;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\components\Curl;


/**
 * Clients controller
 */
class PosController extends Controller {

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

    public function beforeAction($action) {
        if ($action->id == 'error') {
            $this->layout = 'error';
        }
     //   $this->permissions = Helper::checkAuthority(Yii::$app->controller->id, Yii::$app->controller->action->id);

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
    public function actionIndex() {
        $g = Yii::$app->request->get();
        $p = Yii::$app->request->post();
        if (!empty($g)) {
            $post = $g;
        }
        elseif ($p) {
            $post = $p;
        }
        else {
            $post = [];
        }

        if (isset($post['from']) && $post['from'] != '' && isset($post['to']) && $post['to'] != '') {
            if (isset($post[Yii::$app->request->csrfParam])) {
                unset($post[Yii::$app->request->csrfParam]);
            }
            $curl = new Curl();
            $schedules = $curl->setOption(
                    CURLOPT_POSTFIELDS, ['post' => Misc::json_encode($post)])
                              ->post(Yii::$app->params['api_path'] . '/search/tickets');

            if (!empty($schedules)) {
                $f = $curl->setOption(
                        CURLOPT_POSTFIELDS, ['post' => Misc::json_encode($post)])
                          ->post(Yii::$app->params['api_path'] . '/search/pos-filters');

                if ($f != '') {
                    $filters = Misc::json_decode($f);
                }
            }

        }
        return $this->render('index', [
                'schedules' => (isset($schedules) && $schedules != '') ? Misc::json_decode($schedules, true) : [],
                'search'    => (!empty($post)) ? $post : [],
                'filters'   => (isset($filters)) ? $filters : []
        ]);
    }


    public function actionUpdate() {
        return $this->redirect(Yii::$app->request->baseUrl . '/pos/');
    }
}
