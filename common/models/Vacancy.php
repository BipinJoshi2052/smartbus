<?php

namespace common\models;

use common\models\generated\BlogCategories;
use common\models\generated\User;

class Vacancy extends \common\models\generated\Vacancy {
    public function rules() {
        return [
                [['description'], 'string'],
                [['is_active'], 'integer'],
                [['updated_on'], 'required'],
                [['updated_on', 'created_on'], 'safe'],
                [['title'], 'string', 'max' => 200],
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