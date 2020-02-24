<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "ac_ledger_entry".
 *
 * @property int $id
 * @property int $entry_group
 * @property int $ledger_id
 * @property string $tr_date
 * @property string $particular
 * @property string $remarks
 * @property double $debit
 * @property double $credit
 * @property int $journal_id
 * @property int $transaction_id
 * @property int $booking_id
 * @property string $created_on
 * @property int $created_by
 * @property int $is_ob
 * @property string $tax_type
 * @property double $tax_rate
 *
 * @property AcLedgerEntry $entryGroup
 * @property AcLedgerEntry[] $acLedgerEntries
 * @property AcJournalVouchers $journal
 * @property AcLedgers $ledger
 * @property Transactions $transaction
 * @property User $createdBy
 */
class AcLedgerEntry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ac_ledger_entry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entry_group', 'ledger_id', 'journal_id', 'transaction_id', 'booking_id', 'created_by', 'is_ob'], 'integer'],
            [['ledger_id', 'tr_date', 'remarks', 'debit', 'credit', 'created_by', 'is_ob'], 'required'],
            [['tr_date', 'created_on'], 'safe'],
            [['remarks'], 'string'],
            [['debit', 'credit', 'tax_rate'], 'number'],
            [['particular', 'tax_type'], 'string', 'max' => 128],
            [['entry_group'], 'exist', 'skipOnError' => true, 'targetClass' => AcLedgerEntry::className(), 'targetAttribute' => ['entry_group' => 'id']],
            [['journal_id'], 'exist', 'skipOnError' => true, 'targetClass' => AcJournalVouchers::className(), 'targetAttribute' => ['journal_id' => 'id']],
            [['ledger_id'], 'exist', 'skipOnError' => true, 'targetClass' => AcLedgers::className(), 'targetAttribute' => ['ledger_id' => 'id']],
            [['transaction_id'], 'exist', 'skipOnError' => true, 'targetClass' => Transactions::className(), 'targetAttribute' => ['transaction_id' => 'id']],
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
            'entry_group' => 'Entry Group',
            'ledger_id' => 'Ledger ID',
            'tr_date' => 'Tr Date',
            'particular' => 'Particular',
            'remarks' => 'Remarks',
            'debit' => 'Debit',
            'credit' => 'Credit',
            'journal_id' => 'Journal ID',
            'transaction_id' => 'Transaction ID',
            'booking_id' => 'Booking ID',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'is_ob' => 'Is Ob',
            'tax_type' => 'Tax Type',
            'tax_rate' => 'Tax Rate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntryGroup()
    {
        return $this->hasOne(AcLedgerEntry::className(), ['id' => 'entry_group']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcLedgerEntries()
    {
        return $this->hasMany(AcLedgerEntry::className(), ['entry_group' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJournal()
    {
        return $this->hasOne(AcJournalVouchers::className(), ['id' => 'journal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLedger()
    {
        return $this->hasOne(AcLedgers::className(), ['id' => 'ledger_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaction()
    {
        return $this->hasOne(Transactions::className(), ['id' => 'transaction_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
