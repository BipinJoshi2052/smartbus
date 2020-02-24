<?php

namespace common\models;

class Vehicles extends \common\models\generated\Vehicles {
    public function rules() {
        return array_merge(Parent::rules(), [
                [['number_plate', 'bluebook_num', 'manufacturer', 'model', 'description'], 'filter', 'filter' => 'trim'],
                [['number_plate', 'bluebook_num'], 'filter', 'filter' => 'strtoupper'],
                [['number_plate'], 'filter', 'filter' => (function ($value) {
                    return preg_replace("/[^A-Za-z0-9]/", '', $value);
                    // return str_replace(['_', '-', ' '], '', $value);
                })],
        ]);


    }

    public function getVerification() {
        return Parent::getVerification()
                     ->with('verifiedBy');
    }

    public function getUser() {
        return Parent::getUser()
                     ->with('userDetails');
    }

    public function getVehicleType() {
        return Parent::getType0();
    }

    public function getVehicleRatings() {
        return Parent::getVehicleRatings()
                     ->with('ratingType');
    }





}

