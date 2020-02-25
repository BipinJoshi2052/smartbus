<?php

namespace common\models;

use common\models\generated\BlogCategories;
use common\models\generated\User;
use Yii;

class Explore extends \common\models\generated\Explore {
    public function rules() {
        return [
                [['title'], 'required'],
                [['is_active', 'created_by', 'updated_by'], 'integer'],
                [['created_on', 'updated_on'], 'safe'],
                [['title', 'image'], 'string', 'max' => 200],
                [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
                [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
    public function getAuthor() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

}