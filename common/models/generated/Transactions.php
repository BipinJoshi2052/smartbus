<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property int $id
 * @property int $ledger_id
 * @property string $code
 * @property int $type
 * @property string $created_on
 * @property int $booking_id
 * @property string $description
 *
 * @property AcLedgerEntry[] $acLedgerEntries
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ledger_id', 'code', 'type', 'booking_id', 'description'], 'required'],
            [['ledger_id', 'type', 'booking_id'], 'integer'],
            [['code', 'description'], 'string'],
            [['created_on'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ledger_id' => 'Ledger ID',
            'code' => 'Code',
            'type' => 'Type',
            'created_on' => 'Created On',
            'booking_id' => 'Booking ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcLedgerEntries()
    {
        return $this->hasMany(AcLedgerEntry::className(), ['transaction_id' => 'id']);
    }
}
