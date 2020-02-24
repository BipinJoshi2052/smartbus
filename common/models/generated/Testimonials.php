<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "testimonials".
 *
 * @property int $id
 * @property string $image
 * @property string $name
 * @property string $info
 * @property string $position
 * @property string $content
 * @property string $created_on
 */
class Testimonials extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'testimonials';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'content'], 'required'],
            [['info', 'content'], 'string'],
            [['created_on'], 'safe'],
            [['image'], 'string', 'max' => 64],
            [['name', 'position'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'name' => 'Name',
            'info' => 'Info',
            'position' => 'Position',
            'content' => 'Content',
            'created_on' => 'Created On',
        ];
    }
}
