<?php

namespace common\models;

class VehicleTypes extends \common\models\generated\VehicleTypes {
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
