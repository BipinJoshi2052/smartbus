<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "passenger_details".
 *
 * @property int $id
 * @property int $booking_id
 * @property int $seat_id
 * @property string $name
 * @property string $email
 * @property string $gender
 * @property string $dob
 * @property int $age
 * @property string $phone
 * @property string $seat
 * @property string $remarks
 * @property string $special_requests
 * @property string $created_on
 *
 * @property Bookings $booking
 */
class PassengerDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'passenger_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['booking_id', 'seat_id', 'gender', 'age', 'seat', 'remarks'], 'required'],
            [['booking_id', 'seat_id', 'age'], 'integer'],
            [['name', 'gender', 'remarks', 'special_requests'], 'string'],
            [['dob', 'created_on'], 'safe'],
            [['email', 'phone', 'seat'], 'string', 'max' => 64],
            [['booking_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bookings::className(), 'targetAttribute' => ['booking_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'booking_id' => 'Booking ID',
            'seat_id' => 'Seat ID',
            'name' => 'Name',
            'email' => 'Email',
            'gender' => 'Gender',
            'dob' => 'Dob',
            'age' => 'Age',
            'phone' => 'Phone',
            'seat' => 'Seat',
            'remarks' => 'Remarks',
            'special_requests' => 'Special Requests',
            'created_on' => 'Created On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooking()
    {
        return $this->hasOne(Bookings::className(), ['id' => 'booking_id']);
    }
}
