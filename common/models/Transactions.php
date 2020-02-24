<?php

namespace common\models;

class Transactions extends \common\models\generated\Transactions {
    public function rules() {
        return array_merge(Parent::rules(), [

        ]);
    }


}
