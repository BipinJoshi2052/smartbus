<?php

namespace common\models;

use common\models\generated\UserRoles;
use common\models\generated\VerificationUsers;
use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

//use yii\behaviors\TimestampBehavior;

class User extends \common\models\generated\User implements IdentityInterface {
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            //    TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return array_merge(Parent::rules(), [
                ['status', 'default', 'value' => self::STATUS_ACTIVE],
                ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
                [['name', 'email', 'phone'], 'filter', 'filter' => 'trim'],
                [['name'], 'filter', 'filter' => 'ucwords'],
                [['incorrect_login'], 'default', 'value' => 0],
                [['email'], 'unique', 'targetClass' => '\common\models\User'],
                [['email'], 'default', 'value' => null],

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id) {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }
    public static function findByEmail($email)
    {
        return static::findOne(['username' =>$email]);
    }
    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['auth_key' => $token, 'status' => self::STATUS_ACTIVE]); //,  'is_verified' => true
    }

    public static function findByEmailVerification($token) {
        return static::findOne(['email_verification' => $token,]); //,  'is_verified' => true
    }
    /**
     * {@inheritdoc}
     */
    public static function validateToken($token) {

        $u = static::findOne(['auth_key' => $token, 'status' => self::STATUS_ACTIVE]); //,  'is_verified' => true
        return (!empty($u)) ? true : false;
    }

    public static function findAllByRole($role) {
        return static::findAll(['role' => Yii::$app->params['role_num'][$role]]);
    }

    /**
     * Finds user by username
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }
    /**
     * Finds user by username
     * @param string $username
     * @return static|null
     */
    public static function findByUsernameAll($username) {
        return static::findOne(['username' => $username]);
    }
    /**
     * Finds user by password reset token
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                                       'password_reset_token' => $token,
                                       'status'               => self::STATUS_ACTIVE,
                               ]);
    }

    /**
     * Finds out if password reset token is valid
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey() {
        return $this->auth_key;
    }
public function getEmailKey() {
        return $this->email_verification;
    }
    public function getPasswordResetToken() {
        return $this->password_reset_token;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }
    public function validateEmailCode($emailKey) {
        return $this->getEmailKey() === $emailKey;
    }
public function validateResetPasswordToken($token) {
        return $this->getPasswordResetToken() === $token;
    }

    /**
     * Validates password
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     * @param string $password
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    public function generateEmailCode() {
        $this->email_verification = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->password_reset_token = null;
    }

    public function getUserDetails() {
        return $this->hasOne(UserDetails::className(), ['user_id' => 'id']);
    }

    public function getRole() {
        return parent::getRole0();
    }

}
