<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "{{%pages}}".
 *
 * @property int $id
 * @property string $name
 * @property string $label
 * @property string $image
 * @property string $on_menu
 * @property int $is_active
 * @property int $page_status
 * @property string $created_on
 *
 * @property Sections[] $sections
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pages}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'label'], 'required'],
            [['on_menu'], 'string'],
            [['is_active', 'page_status'], 'integer'],
            [['created_on'], 'safe'],
            [['name', 'label'], 'string', 'max' => 128],
            [['image'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'label' => 'Label',
            'image' => 'Image',
            'on_menu' => 'On Menu',
            'is_active' => 'Is Active',
            'page_status' => 'Page Status',
            'created_on' => 'Created On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Sections::className(), ['page_id' => 'id']);
    }
}
