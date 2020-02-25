<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "{{%explore}}".
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property int $is_active
 * @property string $created_on
 * @property int $created_by
 * @property string $updated_on
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Explore extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%explore}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'created_by', 'updated_by'], 'required'],
            [['is_active', 'created_by', 'updated_by'], 'integer'],
            [['created_on', 'updated_on'], 'safe'],
            [['title', 'image'], 'string', 'max' => 200],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
            'image' => 'Image',
            'is_active' => 'Is Active',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'updated_on' => 'Updated On',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
