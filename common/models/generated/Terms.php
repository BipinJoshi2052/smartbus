<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "{{%terms}}".
 *
 * @property int $id
 * @property string $section
 * @property string $content
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 */
class Terms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%terms}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section', 'content'], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section' => 'Section',
            'content' => 'Content',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
