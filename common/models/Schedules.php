<?php

namespace common\models;

class Schedules extends \common\models\generated\Schedules {
    public function rules() {
        return array_merge(Parent::rules(), [
                [['additional_note', 'cancellation_note'], 'filter', 'filter' => 'trim'],
                [['location_from', 'location_to'], 'default', 'value' => null],
        ]);
    }

    public function getUser() {
        return Parent::getUser()
                     ->with('userDetails');
    }

    public function getVehicle() {

        return $this->hasOne(Vehicles::className(), ['id' => 'vehicle_id'])
                    ->with('vehicleType')
                    ->with('vehicleComments')
                    ->with('vehicleRatings');
    }

    public function getScheduleRoutes() {
        return Parent::getScheduleRoutes()
                     ->with('location')
                     ->orderBy(['order_index' => SORT_ASC]);
    }
}







