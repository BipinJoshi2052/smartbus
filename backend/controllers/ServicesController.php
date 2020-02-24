<?php

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperServices;
use common\components\Misc;
use common\models\Services;
use Yii;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Clients controller
 */
class ServicesController extends Controller {
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
                'services' => Services::find()
                                      ->all(),
                'editable' => ($id > 0) ? Services::findOne($id) : false,
        ]);
    }

    public function actionUpdate() {
        $image = (isset($_FILES['image'])) ? $_FILES['image'] : [];
        if (isset($_POST['service'])) {
            $updated = HelperServices::set($_POST['service'], $image);
            if ($updated != false) {
                Misc::setFlash('success', 'Service Updated');
                //return $this->redirect(Yii::$app->request->baseUrl . '/Services/edit/' . Misc::encrypt($updated['id']));
            }
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/services/');
    }

}
