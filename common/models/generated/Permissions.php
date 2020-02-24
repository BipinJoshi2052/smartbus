<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "permissions".
 *
 * @property int $id
 * @property string $permissions
 * @property string $created_on
 * @property string $updated_on
 * @property int $updated_by
 * @property int $created_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Permissions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'permissions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['permissions'], 'string'],
            [['created_on', 'updated_on'], 'safe'],
            [['updated_by', 'created_by'], 'integer'],
            [['created_by'], 'required'],
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
            'permissions' => 'Permissions',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
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
