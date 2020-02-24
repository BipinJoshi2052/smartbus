<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ac_ledger_type".
 *
 * @property int $id
 * @property string $type
 * @property string $remark
 * @property string $operator
 * @property string $created_on
 * @property int $created_by
 * @property string $updated_on
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property AcLedgers[] $acLedgers
 */
class AcLedgerType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ac_ledger_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type', 'operator', 'created_by'], 'required'],
            [['id', 'created_by', 'updated_by'], 'integer'],
            [['remark'], 'string'],
            [['created_on', 'updated_on'], 'safe'],
            [['type'], 'string', 'max' => 120],
            [['operator'], 'string', 'max' => 16],
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
            'type' => 'Type',
            'remark' => 'Remark',
            'operator' => 'Operator',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcLedgers()
    {
        return $this->hasMany(AcLedgers::className(), ['ledger_type' => 'id']);
    }
}
