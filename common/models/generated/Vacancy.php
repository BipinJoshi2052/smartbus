<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "{{%vacancy}}".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $is_active
 * @property string $updated_on
 * @property string $created_on
 */
class Vacancy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%vacancy}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['is_active'], 'integer'],
            [['updated_on'], 'required'],
            [['updated_on', 'created_on'], 'safe'],
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
            'is_active' => 'Is Active',
            'updated_on' => 'Updated On',
            'created_on' => 'Created On',
        ];
    }
}
