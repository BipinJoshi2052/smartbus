<?php

namespace common\models;

class Settings extends \common\models\generated\Settings {
    public function rules() {
        return array_merge(Parent::rules(), [

        ]);
    }
    public static function getSettings(){
        return parent::find()->asArray()->all();
    }

}

