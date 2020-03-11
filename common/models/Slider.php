<?php

namespace common\models;

use common\models\generated\BlogCategories;
use common\models\generated\User;

class Slider extends \common\models\generated\Slider {
    public function rules() {
        return array_merge(Parent::rules(), [
                [['title'], 'filter', 'filter' => 'trim'],
        ]);
    }

    public function getAuthor() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getBlogComments() {
        return $this->hasMany(BlogComments::className(), ['blog_id' => 'id'])
                    ->andWhere('is_active = 1')
                    ->andWhere('is_verified = 1')
                    ->with('user');
    }


}