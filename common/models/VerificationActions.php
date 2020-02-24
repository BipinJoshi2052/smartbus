<?php

namespace common\models;

class VerificationActions extends \common\models\generated\VerificationActions {
    public function rules() {
        return array_merge(Parent::rules(), [
        ]);
    }
    public function getVerifieduser()
    {
        return $this->hasOne(User::className(), ['id' => 'verified_by']);
    }
    public function getRequesteduser()
    {
        return $this->hasOne(User::className(), ['id' => 'requested_by']);
    }
}








