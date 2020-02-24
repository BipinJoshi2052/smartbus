<?php

namespace common\models;

class PassengerDetails extends \common\models\generated\PassengerDetails {
    public function rules() {
        return array_merge(Parent::rules(), [
                [['name'], 'filter', 'filter' => 'trim'],
                [['name'], 'filter', 'filter' => 'strtolower'],
        ]);
    }


}
