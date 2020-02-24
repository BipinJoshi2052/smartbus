<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "schedules".
 *
 * @property int $id
 * @property int $user_id
 * @property int $vehicle_id
 * @property int $is_active
 * @property string $seats
 * @property string $duration
 * @property string $departure
 * @property string $arrival
 * @property string $location_from
 * @property string $location_to
 * @property int $location_from_id
 * @property int $location_to_id
 * @property string $prices
 * @property string $additional_note
 * @property string $cancellation_note
 * @property string $cancellation_rates
 * @property string $drivers_info
 * @property int $has_departed
 * @property int $operator_id
 * @property int $operator_has_verified
 * @property int $booking_closed
 * @property string $created_on
 * @property int $created_by
 * @property string $updated_on
 * @property int $updated_by
 *
 * @property Bookings[] $bookings
 * @property ScheduleDepartures[] $scheduleDepartures
 * @property ScheduleRoutes[] $scheduleRoutes
 * @property Locations $locationTo
 * @property User $user
 * @property Vehicles $vehicle
 * @property UserDetails $user0
 * @property User $createdBy
 * @property User $updatedBy
 * @property User $operator
 * @property Locations $locationFrom
 */
class Schedules extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'vehicle_id', 'seats', 'departure', 'arrival', 'operator_has_verified'], 'required'],
            [['user_id', 'vehicle_id', 'is_active', 'location_from_id', 'location_to_id', 'has_departed', 'operator_id', 'operator_has_verified', 'booking_closed', 'created_by', 'updated_by'], 'integer'],
            [['seats', 'prices', 'additional_note', 'cancellation_note', 'cancellation_rates', 'drivers_info'], 'string'],
            [['departure', 'arrival', 'created_on', 'updated_on'], 'safe'],
            [['duration'], 'string', 'max' => 32],
            [['location_from', 'location_to'], 'string', 'max' => 256],
            [['location_to_id'], 'exist', 'skipOnError' => true, 'targetClass' => Locations::className(), 'targetAttribute' => ['location_to_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicles::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserDetails::className(), 'targetAttribute' => ['user_id' => 'user_id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['operator_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['operator_id' => 'id']],
            [['location_from_id'], 'exist', 'skipOnError' => true, 'targetClass' => Locations::className(), 'targetAttribute' => ['location_from_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'vehicle_id' => 'Vehicle ID',
            'is_active' => 'Is Active',
            'seats' => 'Seats',
            'duration' => 'Duration',
            'departure' => 'Departure',
            'arrival' => 'Arrival',
            'location_from' => 'Location From',
            'location_to' => 'Location To',
            'location_from_id' => 'Location From ID',
            'location_to_id' => 'Location To ID',
            'prices' => 'Prices',
            'additional_note' => 'Additional Note',
            'cancellation_note' => 'Cancellation Note',
            'cancellation_rates' => 'Cancellation Rates',
            'drivers_info' => 'Drivers Info',
            'has_departed' => 'Has Departed',
            'operator_id' => 'Operator ID',
            'operator_has_verified' => 'Operator Has Verified',
            'booking_closed' => 'Booking Closed',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'updated_on' => 'Updated On',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Bookings::className(), ['schedule_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScheduleDepartures()
    {
        return $this->hasMany(ScheduleDepartures::className(), ['schedule_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScheduleRoutes()
    {
        return $this->hasMany(ScheduleRoutes::className(), ['schedule_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocationTo()
    {
        return $this->hasOne(Locations::className(), ['id' => 'location_to_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(Vehicles::className(), ['id' => 'vehicle_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(UserDetails::className(), ['user_id' => 'user_id']);
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
    public function getOperator()
    {
        return $this->hasOne(User::className(), ['id' => 'operator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocationFrom()
    {
        return $this->hasOne(Locations::className(), ['id' => 'location_from_id']);
    }
}
