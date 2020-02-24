<?php

namespace common\models;

class News extends \common\models\generated\News {
    public function rules() {
        return array_merge(Parent::rules(), [
                [['post_content', 'subtitle'], 'filter', 'filter' => 'trim']
        ]);
    }
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}



