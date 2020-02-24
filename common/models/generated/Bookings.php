<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "bookings".
 *
 * @property int $id
 * @property string $booking_code
 * @property int $schedule_id
 * @property int $booker_id
 * @property int $booking_status
 * @property int $boarding
 * @property int $dropping
 * @property double $price
 * @property string $payment
 * @property string $seats
 * @property int $seat_count
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $requests
 * @property int $can_cancel_ticket
 * @property string $operator_verified
 * @property int $is_verified
 * @property int $verification_id
 * @property int $is_cancelled
 * @property string $cancellation_date
 * @property int $cancelled_by
 * @property string $cancellation_comment
 * @property int $has_travelled
 * @property string $created_on
 * @property int $created_by
 * @property string $has_insurance
 *
 * @property Schedules $schedule
 * @property User $booker
 * @property User $createdBy
 * @property Locations $boarding0
 * @property Locations $dropping0
 */
class Bookings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bookings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['schedule_id', 'booking_status', 'boarding', 'dropping', 'price', 'payment', 'seats', 'seat_count', 'name'], 'required'],
            [['schedule_id', 'booker_id', 'booking_status', 'boarding', 'dropping', 'seat_count', 'can_cancel_ticket', 'is_verified', 'verification_id', 'is_cancelled', 'cancelled_by', 'has_travelled', 'created_by'], 'integer'],
            [['price'], 'number'],
            [['payment', 'seats', 'name', 'requests', 'operator_verified', 'cancellation_comment', 'has_insurance'], 'string'],
            [['cancellation_date', 'created_on'], 'safe'],
            [['booking_code'], 'string', 'max' => 128],
            [['phone', 'email'], 'string', 'max' => 64],
            [['schedule_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schedules::className(), 'targetAttribute' => ['schedule_id' => 'id']],
            [['booker_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['booker_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['boarding'], 'exist', 'skipOnError' => true, 'targetClass' => Locations::className(), 'targetAttribute' => ['boarding' => 'id']],
            [['dropping'], 'exist', 'skipOnError' => true, 'targetClass' => Locations::className(), 'targetAttribute' => ['dropping' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'booking_code' => 'Booking Code',
            'schedule_id' => 'Schedule ID',
            'booker_id' => 'Booker ID',
            'booking_status' => 'Booking Status',
            'boarding' => 'Boarding',
            'dropping' => 'Dropping',
            'price' => 'Price',
            'payment' => 'Payment',
            'seats' => 'Seats',
            'seat_count' => 'Seat Count',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'requests' => 'Requests',
            'can_cancel_ticket' => 'Can Cancel Ticket',
            'operator_verified' => 'Operator Verified',
            'is_verified' => 'Is Verified',
            'verification_id' => 'Verification ID',
            'is_cancelled' => 'Is Cancelled',
            'cancellation_date' => 'Cancellation Date',
            'cancelled_by' => 'Cancelled By',
            'cancellation_comment' => 'Cancellation Comment',
            'has_travelled' => 'Has Travelled',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'has_insurance' => 'Has Insurance',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedule()
    {
        return $this->hasOne(Schedules::className(), ['id' => 'schedule_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooker()
    {
        return $this->hasOne(User::className(), ['id' => 'booker_id']);
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
    public function getBoarding0()
    {
        return $this->hasOne(Locations::className(), ['id' => 'boarding']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDropping0()
    {
        return $this->hasOne(Locations::className(), ['id' => 'dropping']);
    }
}
