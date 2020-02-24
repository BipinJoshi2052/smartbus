<?php

namespace common\models;

class Bookings extends \common\models\generated\Bookings {
    public function rules() {
        return array_merge(Parent::rules(), [
                [['name', 'requests'], 'filter', 'filter' => 'trim']
        ]);
    }
}



