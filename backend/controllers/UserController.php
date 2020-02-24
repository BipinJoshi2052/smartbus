<?php

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperUser as HUser;
use common\components\Misc;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


class UserController extends Controller {
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
                                        'actions' => ['logout'],
                                        'allow'   => true,
                                        'roles'   => ['@'],
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
        if (in_array(Yii::$app->params['role_assoc'][Yii::$app->session[Yii::$app->params['user-session']]->role], $this->critical)) {
            return $this->redirect(Yii::$app->request->baseUrl . '/admin/profile');
        }
        else {
            return $this->redirect(Yii::$app->request->baseUrl . '/operator/profile');
        }
    }

    /* Administrator */
    public function actionAdministrators() {
        if (Yii::$app->user->isGuest
                || !in_array(Yii::$app->params['role_assoc'][Yii::$app->session[Yii::$app->params['user-session']]->role], $this->critical)
        ) {
            return $this->redirect(Yii::$app->request->baseUrl . '/site/logout');
        }

        $users = HUser::getUsersByRole('', Yii::$app->params['role_assoc']['admin']);
        return $this->render('admin/list', ['users' => $users]);
    }

    public function actionViewAdministrator($username) {
        if (Yii::$app->user->isGuest
                || !in_array(Yii::$app->params['role_assoc'][Yii::$app->session[Yii::$app->params['user-session']]->role], $this->critical)
        ) {
            return $this->redirect(Yii::$app->request->baseUrl . '/site/logout');
        }

        $user = HUser::getUser('username', $username);
        return $this->render('admin/profile', ['user' => $user]);
    }

    public function actionCreateAdministrator() {
        if (Yii::$app->user->isGuest
                || !in_array(Yii::$app->params['role_assoc'][Yii::$app->session[Yii::$app->params['user-session']]->role], $this->critical)
        ) {
            return $this->redirect(Yii::$app->request->baseUrl . '/site/logout');
        }

        return $this->render('admin/add');
    }

    public function actionAddAdministrator() {

        if (Yii::$app->user->isGuest
                || !in_array(Yii::$app->params['role_assoc'][Yii::$app->session[Yii::$app->params['user-session']]->role], $this->critical)
        ) {
            echo json_encode(false);
            die;
        }

        if (Yii::$app->request->isAjax) {
            if (HUser::addUser($_POST, 'admin')) {
                echo json_encode(true);
                die;
            }
        }
        echo json_encode(false);
        die;
    }

    public function actionUpdateAdministrator($username) {
        if (Yii::$app->user->isGuest
                || !in_array(Yii::$app->params['role_assoc'][Yii::$app->session[Yii::$app->params['user-session']]->role], $this->critical)
        ) {
            return $this->redirect(Yii::$app->request->baseUrl . '/site/logout');
        }

        $user = HUser::getUser('username', $username);
        if ($user) {
            return $this->render('admin/edit', ['user' => $user]);
        }

        return $this->redirect(Yii::$app->request->baseUrl . '/user/administrators');
    }

    public function actionEditAdministrator() {
        if (Yii::$app->user->isGuest
                || !in_array(Yii::$app->params['role_assoc'][Yii::$app->session[Yii::$app->params['user-session']]->role], $this->critical)
        ) {
            echo json_encode(false);
            die;
        }

        if (Yii::$app->request->isAjax) {
            echo json_encode(HUser::editUser($_POST, $_POST['id']));
            die;
        }
        echo json_encode(false);
        die;
    }

    /* Operators */
    public function actionOperators() {
        $users = HUser::getUsersByRole('', Yii::$app->params['role_assoc']['operator']);
        return $this->render('operator/list', ['users' => $users]);
    }

    public function actionViewOperator($username) {
        $user = HUser::getUser('username', $username);
        return $this->render('operator/profile', ['user' => $user]);
    }

    public function actionCreateOperator() {
        return $this->render('operator/add');
    }

    public function actionAddOperator() {
        if (Yii::$app->request->isAjax) {
            if (HUser::addUser($_POST, 'operator')) {
                echo json_encode(true);
                die;
            }
        }
        echo json_encode(false);
        die;
    }

    public function actionUpdateOperator($username) {
        $user = HUser::getUser('username', $username);
        if ($user) {
            return $this->render('operator/edit', ['user' => $user]);
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/user/operators');
    }

    public function actionEditOperator() {
        if (Yii::$app->request->isAjax) {
            echo json_encode(HUser::editUser($_POST, $_POST['id']));
            die;
        }
        echo json_encode(false);
        die;
    }

    /* Clients */
    public function actionClients() {
        $users = HUser::getUsersByRole('', Yii::$app->params['role_assoc']['client']);
        return $this->render('client/list', ['users' => $users]);
    }

    public function actionViewClient($username) {
        $user = HUser::getUser('username', $username);
        return $this->render('client/profile', ['user' => $user]);
    }

    public function actionCreateClient() {
        return $this->render('client/add');
    }

    public function actionAddClient() {
        if (Yii::$app->request->isAjax) {
            if (HUser::addUser($_POST, 'client')) {
                echo json_encode(true);
                die;
            }
        }
        echo json_encode(false);
        die;
    }

    public function actionUpdateClient($username) {
        $user = HUser::getUser('username', $username);
        if ($user) {
            return $this->render('client/edit', ['user' => $user]);
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/user/clients');
    }

    public function actionEditClient() {
        if (Yii::$app->request->isAjax) {
            echo json_encode(HUser::editUser($_POST, $_POST['id']));
            die;
        }
        echo json_encode(false);
        die;
    }

    /* others */
    public function actionEditAddress() {
        if (Yii::$app->request->isAjax) {
            if (HUser::editableUser($_POST['value'], $_POST['pk'], $_POST['name'])) {
                echo json_encode([
                                         'status'        => 'success',
                                         'display_value' => $_POST['value'],
                                         'msg'           => 'Your data has been updated.',
                                 ]);
                die;
            }
        }
        echo json_encode([
                                 'status'        => 'error',
                                 'display_value' => $_POST['old_value'],
                                 'msg'           => 'Sorry! Could not update your data at this time.',
                         ]);
        die;
    }

    public function actionChangeStatus() {
        if (Yii::$app->request->isAjax) {
            echo json_encode(HUser::toggle('status', $_POST['id']));
            die;
        }
        echo json_encode(false);
        die;
    }

    public function actionUploadProfilePicture() {
        $return = Misc::uploadFile($_FILES['image_file'], 'profile');
        echo json_encode($return);
        die;
    }

    public function actionDeleteProfilePicture() {
        if (Misc::delete_file($_POST['img'], 'profile')) {
            HUser::editableUser('', Yii::$app->session[Yii::$app->params['user-session']]->id, 'profile_picture');
            echo json_encode(true);
            die;
        }
        echo json_encode(false);
        die;
    }

    public function actionCrop() {
        if ($return = Misc::base64_to_jpeg($_POST['image_data'], Yii::$app->session[Yii::$app->params['user-session']]->username, 'profile')) {
            $user = HUser::getUser('id', Yii::$app->session[Yii::$app->params['user-session']]->id);
            if (!empty($user['profile_picture'])) {
                Misc::delete_file($user['profile_picture'], 'profile');
            }
            Misc::delete_file($_POST['image_name'], 'profile');
            HUser::editableUser($return, Yii::$app->session[Yii::$app->params['user-session']]->id, 'profile_picture');
            echo json_encode($return);
            die;
        }
        echo json_encode(false);
        die;
    }

    public function actionChangePassword() {
        echo json_encode(HUser::changePassword($_POST));
        die;
    }

    public function actionCheckUser() {
        if (Misc::if_exists($_POST['username']) && Yii::$app->request->isAjax) {
            echo json_encode(!HUser::checkUser($_POST['username'], $_POST['id'], 'username'));
            die;
        }
        echo json_encode(false);
        die;
    }

    public function actionCheckUserEmail() {
        if (Misc::if_exists($_POST['email']) && Yii::$app->request->isAjax) {
            echo json_encode(!HUser::checkUser($_POST['email'], $_POST['id'], 'email'));
            die;
        }
        echo json_encode(false);
        die;
    }

    public function actionGetUsersForAutocomplete() {
        $users = HUser::getUsers(['name', 'id', 'email', 'mobile']);
        $result = [];
        if ($users != null) {
            foreach ($users as $key => $value) {
                if ($value['id'] != Yii::$app->session[Yii::$app->params['user-session']]->user_id) {
                    array_push($result, ["id" => $value['id'], "name" => strip_tags(ucwords($value['name'])), "email" => $value['email'], "mobile" => $value['mobile']]);
                }
            }
        }
        echo Misc::array_to_json($result);
        die;
    }
}
