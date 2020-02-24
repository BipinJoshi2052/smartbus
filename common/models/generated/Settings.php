<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string $slug
 * @property string $type
 * @property string $caption
 * @property int $is_editable
 * @property string $content
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'type', 'caption', 'is_editable', 'content'], 'required'],
            [['caption', 'content'], 'string'],
            [['is_editable'], 'integer'],
            [['slug'], 'string', 'max' => 128],
            [['type'], 'string', 'max' => 64],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'type' => 'Type',
            'caption' => 'Caption',
            'is_editable' => 'Is Editable',
            'content' => 'Content',
        ];
    }
}
