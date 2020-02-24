<?php

namespace common\models;

class ScheduleRoutes extends \common\models\generated\ScheduleRoutes {
    public function rules() {
        return array_merge(Parent::rules(), [
//                [['additional_note', 'cancelation_note'], 'filter', 'filter' => 'trim'],
        ]);
    }

}







