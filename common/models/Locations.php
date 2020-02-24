<?php

namespace common\models;

class Locations extends \common\models\generated\Locations {
    public function rules() {
        return array_merge(Parent::rules(), [
                [['name'], 'filter', 'filter' => 'trim'],
                [['name'], 'filter', 'filter' => 'strtolower'],
        ]);
    }

    public function getVerification() {
        return Parent::getVerification()
                     ->with('verifiedBy');
    }
}
