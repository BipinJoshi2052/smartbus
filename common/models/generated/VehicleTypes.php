<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "{{%vehicle_types}}".
 *
 * @property int $id
 * @property int $verification_id
 * @property int $is_verified
 * @property string $name
 * @property string $remark
 * @property int $is_active
 * @property string $created_on
 * @property int $created_by
 * @property int $updated_by
 * @property string $updated_on
 *
 * @property User $updatedBy
 * @property User $createdBy
 * @property Vehicles[] $vehicles
 */
class VehicleTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%vehicle_types}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['verification_id', 'is_verified', 'is_active', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'required'],
            [['remark'], 'string'],
            [['created_on', 'updated_on'], 'safe'],
            [['name'], 'string', 'max' => 128],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'verification_id' => 'Verification ID',
            'is_verified' => 'Is Verified',
            'name' => 'Name',
            'remark' => 'Remark',
            'is_active' => 'Is Active',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'updated_on' => 'Updated On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
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
    public function getVehicles()
    {
        return $this->hasMany(Vehicles::className(), ['type' => 'id']);
    }
}
