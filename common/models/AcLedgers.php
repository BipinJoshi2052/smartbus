<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ac_ledgers".
 *
 * @property int $id
 * @property string $ledger_code
 * @property string $name
 * @property double $opening_balance
 * @property double $totaldebit
 * @property double $totalcredit
 * @property double $balance
 * @property int $credit_days
 * @property double $credit_interest_rate
 * @property int $ledger_type
 * @property string $created_on
 * @property int $created_by
 * @property string $updated_on
 * @property int $updated_by
 * @property int $is_active
 * @property int $is_permanent
 *
 * @property AcLedgerEntry[] $acLedgerEntries
 * @property User $createdBy
 * @property AcLedgerType $ledgerType
 * @property User $updatedBy
 */
class AcLedgers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ac_ledgers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ledger_code', 'opening_balance', 'totaldebit', 'totalcredit', 'balance', 'credit_interest_rate', 'created_by'], 'required'],
            [['name'], 'string'],
            [['opening_balance', 'totaldebit', 'totalcredit', 'balance', 'credit_interest_rate'], 'number'],
            [['credit_days', 'ledger_type', 'created_by', 'updated_by', 'is_active', 'is_permanent'], 'integer'],
            [['created_on', 'updated_on'], 'safe'],
            [['ledger_code'], 'string', 'max' => 128],
            [['ledger_code'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['ledger_type'], 'exist', 'skipOnError' => true, 'targetClass' => AcLedgerType::className(), 'targetAttribute' => ['ledger_type' => 'id']],
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
            'ledger_code' => 'Ledger Code',
            'name' => 'Name',
            'opening_balance' => 'Opening Balance',
            'totaldebit' => 'Totaldebit',
            'totalcredit' => 'Totalcredit',
            'balance' => 'Balance',
            'credit_days' => 'Credit Days',
            'credit_interest_rate' => 'Credit Interest Rate',
            'ledger_type' => 'Ledger Type',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'updated_on' => 'Updated On',
            'updated_by' => 'Updated By',
            'is_active' => 'Is Active',
            'is_permanent' => 'Is Permanent',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcLedgerEntries()
    {
        return $this->hasMany(AcLedgerEntry::className(), ['ledger_id' => 'id']);
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
    public function getLedgerType()
    {
        return $this->hasOne(AcLedgerType::className(), ['id' => 'ledger_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
