<?php

namespace backend\controllers;

use common\components\Helper;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\components\Misc;
use Yii;
use yii\web\HttpException;


/**
 * Locations controller
 */
class LocationsController extends Controller {
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
        return $this->render('index', [
                'all'      => Helper::getAll('Locations'),
                'editable' => Helper::getOne('Locations', $id),
                //                'is_authorized'=> in_array('update', $this->permissions)
        ]);
    }

    public function actionUpdate() {
        if (isset($_POST['post'])) {
            $updated = Helper::setModel('locations', $_POST['post']);

            if ($updated != false) {
                if($updated['id'] = $_POST['post']['id']) {
                    Misc::setFlash('success', 'Location Updated.');
                }
                else {
                    Misc::setFlash('success', 'Location Added successfully.');
                }
            }
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/locations/');
    }
}
