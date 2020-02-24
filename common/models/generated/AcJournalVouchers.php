<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "ac_journal_vouchers".
 *
 * @property int $id
 * @property string $journal_code
 * @property string $remarks
 * @property double $debit_total
 * @property double $credit_total
 * @property string $created_on
 * @property string $transaction_date
 * @property int $created_by
 *
 * @property AcLedgerEntry[] $acLedgerEntries
 */
class AcJournalVouchers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ac_journal_vouchers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['journal_code', 'debit_total', 'credit_total', 'transaction_date', 'created_by'], 'required'],
            [['remarks'], 'string'],
            [['debit_total', 'credit_total'], 'number'],
            [['created_on', 'transaction_date'], 'safe'],
            [['created_by'], 'integer'],
            [['journal_code'], 'string', 'max' => 280],
            [['journal_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'journal_code' => 'Journal Code',
            'remarks' => 'Remarks',
            'debit_total' => 'Debit Total',
            'credit_total' => 'Credit Total',
            'created_on' => 'Created On',
            'transaction_date' => 'Transaction Date',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcLedgerEntries()
    {
        return $this->hasMany(AcLedgerEntry::className(), ['journal_id' => 'id']);
    }
}
