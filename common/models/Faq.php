<?php

namespace common\models;


use common\models\generated\User;

class Faq extends \common\models\generated\Faq {
    public function rules() {
        return array_merge(Parent::rules(), [
                [['title'], 'filter', 'filter' => 'trim'],
        ]);
    }

    public function getAuthor() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }




}