<?php

namespace common\modules\api\models;

class Bookings extends \common\models\Bookings {
    const SCENARIO_BOOK = 'book';
    const SCENARIO_EDIT = 'edit';


    public function scenarios() {
        return [
                self::SCENARIO_BOOK => ['schedule_id', 'vehicle_id', 'price', 'seat_count', 'seats', 'name',  'phone', 'email', 'booking_status'],
                self::SCENARIO_EDIT => ['schedule_id']
        ];
    }
}



