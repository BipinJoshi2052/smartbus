<?php

namespace common\models;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Privacy extends \common\models\generated\Privacy {
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

}

