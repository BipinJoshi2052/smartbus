<?php

namespace common\models;

class Messages extends \common\models\generated\Messages {
    public function rules() {
        return array_merge(Parent::rules(), [
                [['name', 'email', 'subject', 'message'], 'filter', 'filter' => 'trim'],        ]);
    }
}

