<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Chetan Rajbhandari
 */

namespace common\components;

use common\components\Email as Email;
use common\models\UserDetails;
use Yii;
use yii\base\Component;
use common\components\Query;
use common\components\Misc;
use common\models\User as User;
use yii\bootstrap\Html;
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use  yii\web\UrlManager;




class HelperUser extends Component {
    public static function resetPassword($email)
    {
        $contact = json_decode(Yii::$app->params['settings']['contact']);;
        if(isset($contact[0]->{'facebook'})){
            $fa= $contact[0]->{'facebook'};
        }
        if(isset($contact[0]->{'twitter'})){
            $tw = $contact[0]->{'twitter'};
        }
        if(isset($contact[0]->{'linkedin'})){
            $ln= $contact[0]->{'linkedin'};
        }
        if(isset($contact[0]->{'google'})){
            $gp= $contact[0]->{'google'};
        }
        $ca =[$fa,$tw,$ln,$gp];
        $subject= 'Reset Password';
        $name= Yii::$app->params['system_name'];
        $id= $email['password_reset_token'];
        $userEmail =$email['username'];
        $url = 'http://smartbus.ritechsolution.com/';
        $body = 'Click on the link to reset your password '.$url.'site/reset-final/'.$id;
       $message=Email::template2('Reset Password',$body,$ca);
       if( Email::sendTo($userEmail,$name,$subject,$message)) {
        return 1;

       }
       else
           {
           return 0;
       }
    }

    public static function addUser($data) {
        //        echo '<pre>';
        //        print_r($data);
        //        echo '</pre>';
        //        die;
        $contact = json_decode(Yii::$app->params['settings']['contact']);
        if(isset($contact[0]->{'facebook'})){
            $fa= $contact[0]->{'facebook'};
        }
        if(isset($contact[0]->{'twitter'})){
            $tw = $contact[0]->{'twitter'};
        }
        if(isset($contact[0]->{'linkedin'})){
            $ln= $contact[0]->{'linkedin'};
        }
        if(isset($contact[0]->{'google'})){
            $gp= $contact[0]->{'google'};
        }

        $model = new User();
        $model->attributes = $data;

        $model->name = isset($data['name']) ? $data['name'] : '';
        $model->username = isset($data['email']) ? $data['email'] : '';
        //   isset($data['password']) ? $model->setPassword($data['password']) : $model->password_hash =Yii::$app->security->generateRandomString(12);
        $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash(12);
        $model->generateAuthKey();
        $model->generateEmailcode() ;
        $model->role = isset($data['role']) ? $data['role'] : 5;
        $model->email = isset($data['email']) ? $data['email'] : '';
        $model->phone = isset($data['phone']) ? $data['phone'] : '';
        $model->incorrect_login = isset($data['incorrect_login']) ? $data['incorrect_login'] : 0;
        //            $model->email_verified = isset($data['verified_email']) ? $data['verified_email'] : 0;

        //$model->profile_picture     = isset($data['profile_picture']) ? $data['profile_picture'] : '';
        $model->status = isset($data['status']) && $data['status'] == 1 ? 10 : 0;
        ////
        if ($model->save()) {
            if(isset($data['email']) && $data['email'] != '') {
                $email=$data['email'];
                $receiver = Yii::$app->params['adminEmail'];
                $name = 'Yoel';
                $subject = 'Sign Up';
                $url ='http://smartbus.ritechsolution.com';
                   $ca =[$fa,$tw,$ln,$gp];
                $id =$model->email_verification;
                $body = 'Click on the link below to verify your email. Thanks '.
                        $url.'/register/validate/'.$id;
               // $message = Email::template('Sign up',$body);
                $message = Email::template2('Signup', $body,$ca);

                if(Email::sendTo($email, $name, $subject, $message))
                {
                  return true;
                }

            }

        }
    }

    public static function editUser($data, $id) {

        $model = User::findOne($id);

        $model->name = isset($data['name']) ? $data['name'] : '';
        $model->username = isset($data['username']) ? $data['username'] : '';
        if (!empty($data['password'])) {
            $model->setPassword($data['password']);
        }
        $model->email = isset($data['email']) ? $data['email'] : '';
        $model->phone = isset($data['phone']) ? $data['phone'] : 0;
        $model->mobile = isset($data['mobile']) ? $data['mobile'] : 0;
        return $model->save(false) ? $model : false;
    }

    public static function editableUser($value, $id, $field) {
        $model = User::findOne($id);
        $model->$field = $value;
        return $model->save(false) ? $model : false;
    }

    public static function getUser($field, $value) {
        $data = Query::queryOne("SELECT * FROM `user` WHERE `$field` = '$value'");
        return Misc::exists($data, false);
    }

    public static function getName($field, $value) {
        $data = Query::queryOne("SELECT username FROM `user` WHERE `$field` = '$value'");
        return Misc::exists($data, false);
    }

    public static function getUsers($fields = '') {
        $select = Misc::if_exists($fields) ? implode(', ', $fields) : '*';
        $data = Query::queryAll("SELECT $select FROM `user`");
        return Misc::exists($data, false);
    }

    public static function getUsersByRole($fields = '', $role) {
        $select = Misc::if_exists($fields) ? implode(', ', $fields) : '*';
        $data = Query::queryAll("SELECT $select FROM `user` WHERE role = '$role'");
        return Misc::exists($data, false);
    }

    public static function checkUser($value, $id, $field) {
        ($condition = $id > 0) ? " AND `id` != $id" : "";
        $data = Query::queryOne("SELECT * FROM `user` WHERE `$field` = '$value' $condition");
        return Misc::exists($data, false);
    }

    public static function toggle($field, $id) {
        $model = User::findOne($id);
        $model->$field = ($model->$field == 0) ? 10 : 0;
        return $model->update() ? true : false;
    }

    public static function changePassword($data) {

        $model = User::findOne(Yii::$app->user->identity->id);
        $data = Misc::array_strip_tags($data);
        if (Misc::if_exists($data['old_password'])) {
            if ($model->validatePassword($data['old_password'])) {
                if (Misc::if_exists($data['new_password']) && Misc::if_exists($data['confirm_password'])) {
                    if ($data['new_password'] == $data['confirm_password']) {
                        $model->setPassword($data['new_password']);
                        if ($model->update(false)) {
                            $return = 'ss';
                        }
                        else {
                            $return = 'ff';
                        }
                    }
                    else {
                        $return = 'mm';
                    }
                }
                else {
                    $return = 'mm';
                }
            }
            else {
                $return = 'icp';
            }
        }
        else {
            $return = 'icp';
        }
        return ['status' => $return];
    }

    public static function getUserDetails() {
        $model=UserDetails::find()->asArray()->all();
        return $model;
    }
    public static function getSingleUserDetails($id) {

        $model=UserDetails::find()->where('user_id ='.$id)->with('user')->asArray()->one();

        return $model;
    }
}
