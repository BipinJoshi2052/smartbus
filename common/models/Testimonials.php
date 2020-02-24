<?php

namespace common\models;

class Testimonials extends \common\models\generated\Testimonials {
    public function rules() {
        return array_merge(Parent::rules(), [
                [['name', 'position', 'content', 'info'], 'filter', 'filter' => 'trim']
        ]);
    }
}


