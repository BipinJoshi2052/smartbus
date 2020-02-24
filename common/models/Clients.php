<?php

namespace common\models;

class Clients extends \common\models\generated\Clients {
    public function rules() {
        return array_merge(Parent::rules(), [
                [['name', 'link', 'info'], 'filter', 'filter' => 'trim']
        ]);
    }
}


