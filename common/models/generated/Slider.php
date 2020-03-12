<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "{{%slider}}".
 *
 * @property int $id
 * @property int $slide_order
 * @property string $image
 * @property string $title
 * @property string $subtitle
 * @property string $description
 * @property string $link
 * @property string $created_on
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%slider}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slide_order', 'image', 'title', 'subtitle', 'link'], 'required'],
            [['slide_order'], 'integer'],
            [['image', 'description', 'link'], 'string'],
            [['created_on'], 'safe'],
            [['title', 'subtitle'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slide_order' => 'Slide Order',
            'image' => 'Image',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'description' => 'Description',
            'link' => 'Link',
            'created_on' => 'Created On',
        ];
    }
}
