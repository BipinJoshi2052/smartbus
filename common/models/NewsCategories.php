<?php

namespace common\models;

class NewsCategories extends \common\models\generated\NewsCategories {
    public function rules() {
        return array_merge(Parent::rules(), [

        ]);
    }
}



