<?php

namespace backend\controllers;

use common\components\Helper;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\components\HelperClients;
use common\components\Misc;
use common\models\Clients;
use Yii;


/**
 * Clients controller
 */
class ClientsController extends Controller {
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
    public function actions() {
        return [
                'error' => [
                        'class'  => 'yii\web\ErrorAction',
                        'layout' => 'error',
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
     * Displays homepage.
     * @return string
     */
    public function actionIndex($id = '') {
        $id = Misc::decrypt($id);
        return $this->render('index', [
                'clients'  => Clients::find()
                                     ->all(),
                'editable' => ($id > 0) ? Clients::findOne($id) : false,
        ]);
    }

    public function actionUpdate() {
        $image = (isset($_FILES['image'])) ? $_FILES['image'] : [];
        if (isset($_POST['client'])) {
            $updated = Helper::setModel('clients', $_POST['client'], $image);
            if ($updated != false) {
                Misc::setFlash('success', 'Client Updated.');
                return $this->redirect(Yii::$app->request->baseUrl . '/clients/edit/' . Misc::encrypt($updated['id']));
            }
        }

        return $this->redirect(Yii::$app->request->baseUrl . '/clients/');
    }
}
