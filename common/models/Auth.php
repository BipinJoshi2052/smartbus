<?php

namespace common\models;


use common\models\generated\User;

class Auth extends \common\models\generated\Auth {
    public function rules() {
        return array_merge(Parent::rules(), [

        ]);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }


}