<?php

namespace common\models;

class Amenities extends \common\models\generated\Amenities {
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
