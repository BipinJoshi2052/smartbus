<?php

namespace common\components;

use common\models\Auth;
use common\models\LoginForm;
use common\models\LoginSocial;
use common\models\User;
use common\models\UserDetails;
use Yii;
use yii\authclient\ClientInterface;
use yii\helpers\ArrayHelper;

/**
 * AuthHandler handles successful authentication via Yii auth component
 */
class AuthHandler {
    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client) {
        $this->client = $client;
    }

    public function handle() {

        $attributes = $this->client->getUserAttributes();

        $email = ArrayHelper::getValue($attributes, 'email');
        $id = ArrayHelper::getValue($attributes, 'id');
        $username = ArrayHelper::getValue($attributes, 'given_name');


        if ($email !== null && User::find()->where(['email' => $email])->exists()) {

            /* @var Auth $auth */
            $auth = Auth::find()->where([
                                                'source'    => $this->client->getId(),
                                                'source_id' => $id,
                                        ])->one();

            if ($auth) { // login

                $model = new LoginSocial();
                $model->username = $auth['user']->username;
                $l = $model->login();
                //                return $this->goBack();
                //                                if ($model->load(Yii::$app->request->post()) && $model->login()) {
                //                                    return $this->goBack();
                //                                }
                //                                $m = Yii::$app->user->login($user, 0);

            }
            else{
                $user = User::find()->where(['email' => $email])->one();
                //                echo '<pre>';
                //                print_r($user);
                //                echo '</pre>';
                //                die;
                $auth = new Auth([
                                         'user_id'   => $user['id'],
                                         'source'    => $this->client->getId(),
                                         'source_id' => (string)$id,
                                 ]);
                $auth->save();

                $model = new LoginSocial();
                $model->username = $auth['user']->username;
                $l = $model->login();
                //                return $this->goBack();

            }
        }
        else { // signup
            $password = Yii::$app->security->generateRandomString(12);
            $user = new User([
                                     'username'       => $email,
                                     'name'           => $email,
                                     'email'          => $email,
                                     'password'       => $password,
                                     'role'           => 5,
                                     'email_verified' => 10,
                             ]);
            $user->generateAuthKey();
            $user->generatePasswordResetToken();

            $transaction = User::getDb()->beginTransaction();

            if ($user->save()) {
                $auth = new Auth([
                                         'user_id'   => $user['id'],
                                         'source'    => $this->client->getId(),
                                         'source_id' => (string)$id,
                                 ]);
                $details = new UserDetails(['user_id' => $user['id']]);
                $details->save();

                if ($auth->save()) {
                    $transaction->commit();
                    $model = new LoginSocial();
                    $model->username = $auth['user']->username;
                    $l = $model->login();
                    //                        Yii::$app->user->login($user);
                }
                else {
                    Yii::$app->getSession()->setFlash('error', [
                            Yii::t('app', 'Unable to save {client} account: {errors}', [
                                    'client' => $this->client->getTitle(),
                                    'errors' => json_encode($auth->getErrors()),
                            ]),
                    ]);
                }
            }
            else {
                Yii::$app->getSession()->setFlash('error', [
                        Yii::t('app', 'Unable to save user: {errors}', [
                                'client' => $this->client->getTitle(),
                                'errors' => json_encode($user->getErrors()),
                        ]),
                ]);
            }
        }

        /*   Yii::$app->getSession()->setFlash('error', [
                   Yii::t('app', "User with the same email as in {client} account already exists but isn't linked to it. Login using email first to link it.", ['client' => $this->client->getTitle()]),
           ]);*/

        //echo '<pre>';
        //print_r($auth);
        //echo '</pre>';
        if (Yii::$app->user->isGuest) {
            if ($auth) { // login
                /* @var User $user */

                $user = $auth['user'];
                Yii::$app->user->login($user);
            }
            else { // signup
                $password = Yii::$app->security->generateRandomString(12);
                $user = new User([
                                         'username'       => $email,
                                         'name'           => $email,
                                         'email'          => $email,
                                         'password'       => $password,
                                         'role'           => 5,
                                         'email_verified' => 10,
                                 ]);
                $user->generateAuthKey();
                $user->generatePasswordResetToken();

                $transaction = User::getDb()->beginTransaction();

                if ($user->save()) {
                    $auth = new Auth([
                                             'user_id'   => $user['id'],
                                             'source'    => $this->client->getId(),
                                             'source_id' => (string)$id,
                                     ]);

                    if ($auth->save()) {
                        $transaction->commit();
                        Yii::$app->user->login($user);
                    }
                    else {
                        Yii::$app->getSession()->setFlash('error', [
                                Yii::t('app', 'Unable to save {client} account: {errors}', [
                                        'client' => $this->client->getTitle(),
                                        'errors' => json_encode($auth->getErrors()),
                                ]),
                        ]);
                    }
                }
                else {
                    Yii::$app->getSession()->setFlash('error', [
                            Yii::t('app', 'Unable to save user: {errors}', [
                                    'client' => $this->client->getTitle(),
                                    'errors' => json_encode($user->getErrors()),
                            ]),
                    ]);
                }
            }
        }
        else { // user already logged in
            if (!$auth) { // add auth provider

                $auth = new Auth([
                                         'user_id'   => Yii::$app->user->id,
                                         'source'    => $this->client->getId(),
                                         'source_id' => (string)$attributes['id'],
                                 ]);
                if ($auth->save()) {
                    /** @var User $user */
                    $user = $auth->user;
                    $this->updateUserInfo($user);
                    Yii::$app->getSession()->setFlash('success', [
                            Yii::t('app', 'Linked {client} account.', [
                                    'client' => $this->client->getTitle()
                            ]),
                    ]);
                }
                else {
                    Yii::$app->getSession()->setFlash('error', [
                            Yii::t('app', 'Unable to link {client} account: {errors}', [
                                    'client' => $this->client->getTitle(),
                                    'errors' => json_encode($auth->getErrors()),
                            ]),
                    ]);
                }
            }
            else { // there's existing auth
                Yii::$app->getSession()->setFlash('error', [
                        Yii::t('app',
                               'Unable to link {client} account. There is another user using it.',
                               ['client' => $this->client->getTitle()]),
                ]);
            }
        }
    }

    /**
     * @param User $user
     */
    private function updateUserInfo(User $user) {
        $attributes = $this->client->getUserAttributes();
        $github = ArrayHelper::getValue($attributes, 'login');

        if ($user['email'] === null && $github) {
            $user['email'] = $github;
            $user->save();
        }
    }
}