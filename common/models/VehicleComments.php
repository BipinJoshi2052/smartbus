<?php

namespace common\models;

class VehicleComments extends \common\models\generated\VehicleComments {
    public function rules() {
        return array_merge(Parent::rules(), [
                [['comment', 'name', 'email', 'phone',], 'filter', 'filter' => 'trim']
        ]);
    }


}

