<?php

namespace common\models;

class VendorComments extends \common\models\generated\VendorComments {
    public function rules() {
        return array_merge(Parent::rules(), [
                [['comment', 'name', 'email', 'phone',], 'filter', 'filter' => 'trim']
        ]);
    }

    public function getVerification() {
        return Parent::getVerification()
                     ->with('verifiedBy');
    }
}

