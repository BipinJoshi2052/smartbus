<?php

namespace common\models;

class Permissions extends \common\models\generated\Permissions {

    public function rules() {
        return array_merge(Parent::rules(), [

        ]);
    }
    public function getRole()
    {
        return Parent::getRole0();
    }
}
