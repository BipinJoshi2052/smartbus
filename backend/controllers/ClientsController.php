<?php

namespace backend\controllers;

use app\models\ClientPageContents;
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
                                     ->orderBy(['id' => SORT_DESC])
                                     ->all(),
                'editable' => ($id > 0) ? Clients::findOne($id) : false,
        ]);
    }

    public function actionUpdate() {
        $image = (isset($_FILES['image'])) ? $_FILES['image'] : [];
        if (isset($_POST['client'])) {
            $updated = Helper::setClient( $_POST['client'], $image);
            if ($updated != false) {
                Misc::setFlash('success', 'Client Updated.');
                return $this->redirect(Yii::$app->request->baseUrl . '/clients/edit/' . Misc::encrypt($updated));
            }
        }

        return $this->redirect(Yii::$app->request->baseUrl . '/clients/');
    }

    ///// Clients-page-Management controller section
    public function actionManagement() {

        return $this->render('client-management/management', [
                'page'    => HelperClients::getAllClientsManagement(),
                'clients' => HelperClients::getClients(),

        ]);
    }

    public function actionPost($id = '') {
        $existing_client_id = HelperClients::getOtherclients();
        $post = [];
        if ($id != '') {
            $id = Misc::decrypt($id);
            $post = HelperClients::getSingleClientsPage($id);
        }
        $existing_clients = HelperClients::getAllClientsManagement();
        return $this->render('client-management/form', [
                'clients'            => HelperClients::getClients(),
                'editable'           => $post,
                'existing_client_id' => $existing_client_id
        ]);
    }

    public function actionUp($id = '') {
        $post = Yii::$app->request->post();
        $result = HelperClients::setManagement($post);
        if ($result != false) {
            $this->redirect(Yii::$app->request->baseUrl . '/clients/post/' . Misc::encrypt($result));
        }
    }

    public function actionList() {
        $this->render('client-management/list');
    }

    public function actionDelete() {
        if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
            $delete = HelperClients::deleteClients($_POST['id']);
            return $delete;
        }

    }

    public function actionDeleteClients() {
        if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
            return HelperClients::deleteClientsPage($_POST['id']);
        }

    }
}
