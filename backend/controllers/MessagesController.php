<?php

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperMessages;
use common\components\Misc;
use common\models\Messages;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;

/**
 * Clients controller
 */
class MessagesController extends Controller {
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
                                    //                            'actions' => ['login', 'error'],
                                    'allow' => true,
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
    public function actionIndex() {

        return $this->render('index', [
                'messages' => Messages::find()
                                      ->asArray()
                                      ->all(),
                'count'    => Messages::find()
                                      ->where(['=', 'is_new', '1'])
                                      ->count(),
        ]);
    }

    public function actionReadMessage() {
        echo 'a';
//        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (\Yii::$app->request->isAjax && $_POST['id']) {
            $id = $_POST['id'];
            if ($id > 0) {
                $model = Messages::findOne($id);
                if ($model) {
                    $model->is_new = 0;
                    $name = $model->name;
                    $email = $model->email;
                    $phone = $model->phone;
                    $message = $model->message;
                    $date = $model->created_on;

                    if ($model->save() == true) {

                       return $result = "

                        <div class = \"modal-content\">
                            <div class = \"modal-header\">
                                <h5 class = \"modal-title\"><span id = \"message-title\">Message from <span id = \"message-name\"></span></span>$name</h5>
                                <button type = \"button\" class = \"close\" data-dismiss = \"modal\" aria-label = \"Close\">
                                    <span aria-hidden = \"true\">&times;</span>
                                </button>
                            </div>
                            <div class = \"modal-body\">
                                <div class = \"message-header\">
                                    <div class = \"row\">
                                        <div class = \"col-md-6 col-sm-12\">
                                            <div class = \"message-header-group\">
                                                <div class = \"header-title\"><span class = \"strong\">From:</span></div>
                                                <br><div class = \"header-value\"><span class = \"strong\">Name:<br> </span><span class = \"message-name\"></span>$name</div>
                                                <br><div class = \"header-value\"><span class = \"strong\">Email:<br> </span><span class = \"message-email\"></span>$email</div>
                                                                                            <br>    <div class = \"header-value\"><span class = \"strong\">Phone Number:<br></span> <span class = \"message-phone\"></span>$phone</div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                               <br> <div class = \"message-body\">
                                    <h4>Message : </h4>
                                    <div class = \"message-content\">
                                    $message
</div>
                                </div>
                            </div>
                            <div class = \"modal-footer\">
                                <button type = \"button\" class = \"btn btn-secondary\" data-dismiss = \"modal\">Close</button>
                            </div>
                        </div>
                        ";
                    }
                }
            }

        }
        return false;
    }
    public function actionDelete()
    {
        echo $_POST['id'];
        if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
            return HelperMessages::deleteMessage($_POST['id']);
        }else{
            echo 'Not Working';
        }

    }
}
