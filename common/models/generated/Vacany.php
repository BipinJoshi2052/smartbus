<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "{{%vacany}}".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $created_on
 */
class Vacany extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%vacany}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['created_on'], 'safe'],
            [['title'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'created_on' => 'Created On',
        ];
    }
}
