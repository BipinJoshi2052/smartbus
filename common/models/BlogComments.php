<?php

namespace common\models;

use common\models\generated\User;

class BlogComments extends \common\models\generated\BlogComments {
    public function rules() {
        return array_merge(Parent::rules(), [
                [['comment', 'name', 'email', 'phone'], 'filter', 'filter' => 'trim'],
        ]);
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'customer_id'])->with('role0');
    }
    public function getBlog() {
        return $this->hasOne(Blog::className(), ['id' => 'blog_id']);
    }

    public function getVerification() {
        return Parent::getVerification()
                     ->with('verifiedBy');
    }
    public function getVerifieduser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'verified_by']);
    }
    public function getRequesteduser()
    {
        return $this->hasOne(User::className(), ['id' => 'customer_id'])->with('role0');
    }
}


