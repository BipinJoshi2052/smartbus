<?php

namespace common\models;

class BlogCategories extends \common\models\generated\BlogCategories {
    public function rules() {
        return array_merge(Parent::rules(), [
                [['name', 'remark',], 'filter', 'filter' => 'trim'],
        ]);
    }

    public function getVerification() {
        return Parent::getVerification()
                     ->with('verifiedBy');
    }
}



