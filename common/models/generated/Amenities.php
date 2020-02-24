<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "amenities".
 *
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $icon
 * @property int $verification_id
 * @property int $is_active
 * @property int $is_verified
 * @property string $description
 * @property string $created _on
 * @property int $created_by
 * @property string $updated_on
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property VerificationActions $verification
 */
class Amenities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'amenities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['verification_id', 'is_active', 'is_verified', 'created_by', 'updated_by'], 'integer'],
            [['description'], 'string'],
            [['created _on', 'updated_on'], 'safe'],
            [['name', 'display_name'], 'string', 'max' => 120],
            [['icon'], 'string', 'max' => 60],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['verification_id'], 'exist', 'skipOnError' => true, 'targetClass' => VerificationActions::className(), 'targetAttribute' => ['verification_id' => 'id']],
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
            'display_name' => 'Display Name',
            'icon' => 'Icon',
            'verification_id' => 'Verification ID',
            'is_active' => 'Is Active',
            'is_verified' => 'Is Verified',
            'description' => 'Description',
            'created _on' => 'Created On',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerification()
    {
        return $this->hasOne(VerificationActions::className(), ['id' => 'verification_id']);
    }
}
