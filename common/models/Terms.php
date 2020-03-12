<?php

namespace common\models;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Terms extends \common\models\generated\Terms {
    public function behaviors()
    {
        return [
                [
                        'class' => TimestampBehavior::class,
                        'value' => new Expression('NOW()'),
                ],
                BlameableBehavior::class,
        ];
    }
    public function rules() {
        return array_merge(Parent::rules(), [

        ]);
    }
    public static function getSettings(){
        return parent::find()->asArray()->orderBy(['id'=>SORT_DESC])->all();
    }

}

