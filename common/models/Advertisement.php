<?php

namespace common\models;

use Yii;


class Advertisement extends \common\models\generated\Advertisement
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(Parent::rules(), [
                [['name'], 'filter', 'filter' => 'trim'],
                [['name'], 'filter', 'filter' => 'strtolower'],
                [['name', 'created_by', 'expiring_on'], 'required'],
                [['name', 'alt_text', 'title', 'content', 'email', 'address', 'display_on'], 'string'],
                [['type', 'display_order', 'created_by', 'is_active'], 'integer'],
                [['price'], 'number'],
                [['created_on', 'expiring_on'], 'safe'],
                [['image', 'phone'], 'string', 'max' => 64],
                [['company', 'contact_person'], 'string', 'max' => 128],
        ]);
    }

}
