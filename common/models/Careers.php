<?php

namespace common\models;

use common\models\generated\BlogCategories;
use common\models\generated\User;

class Careers extends \common\models\generated\Careers {
    public function rules() {
        return [
                [['age', 'expected_salary', 'experience', 'website', 'other_details'], 'string'],
                [['is_new'], 'integer'],
                [['created_on'], 'safe'],
                [['name', 'email', 'city', 'phone'], 'string', 'max' => 200],
                [['file'], 'string', 'max' => 250],
        ];
    }

//    public function getAuthor() {
//        return $this->hasOne(User::className(), ['id' => 'created_by']);
//    }
//
//    public function getBlogComments() {
//        return $this->hasMany(BlogComments::className(), ['blog_id' => 'id'])
//                    ->andWhere('is_active = 1')
//                    ->andWhere('is_verified = 1')
//                    ->with('user');
//    }


}