<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ac_taxes".
 *
 * @property int $id
 * @property string $name
 * @property double $rate
 * @property string $remarks
 * @property string $opperator
 * @property string $created_on
 * @property int $created_by
 * @property int $updated_by
 * @property string $updated_on
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class AcTaxes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ac_taxes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'rate', 'created_by'], 'required'],
            [['id', 'created_by', 'updated_by'], 'integer'],
            [['name', 'remarks', 'opperator'], 'string'],
            [['rate'], 'number'],
            [['created_on', 'updated_on'], 'safe'],
            [['id'], 'unique'],
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
            'name' => 'Name',
            'rate' => 'Rate',
            'remarks' => 'Remarks',
            'opperator' => 'Opperator',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'updated_on' => 'Updated On',
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
