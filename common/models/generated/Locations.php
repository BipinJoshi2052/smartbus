<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "locations".
 *
 * @property int $id
 * @property string $name
 * @property string $street
 * @property string $city
 * @property string $district
 * @property string $zone
 * @property string $state
 * @property double $longitude
 * @property double $latitude
 * @property string $description
 * @property int $is_active
 * @property int $is_verified
 * @property int $verification_id
 * @property int $created_by
 * @property int $updated_by
 * @property string $updated_on
 * @property string $created_on
 *
 * @property Bookings[] $bookings
 * @property Bookings[] $bookings0
 * @property VerificationActions $verification
 * @property User $createdBy
 * @property User $updatedBy
 * @property ScheduleRoutes[] $scheduleRoutes
 * @property Schedules[] $schedules
 * @property Schedules[] $schedules0
 */
class Locations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'city', 'created_by'], 'required'],
            [['street', 'city', 'district', 'zone', 'state', 'description'], 'string'],
            [['longitude', 'latitude'], 'number'],
            [['is_active', 'is_verified', 'verification_id', 'created_by', 'updated_by'], 'integer'],
            [['updated_on', 'created_on'], 'safe'],
            [['name'], 'string', 'max' => 128],
            [['verification_id'], 'exist', 'skipOnError' => true, 'targetClass' => VerificationActions::className(), 'targetAttribute' => ['verification_id' => 'id']],
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
            'street' => 'Street',
            'city' => 'City',
            'district' => 'District',
            'zone' => 'Zone',
            'state' => 'State',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'description' => 'Description',
            'is_active' => 'Is Active',
            'is_verified' => 'Is Verified',
            'verification_id' => 'Verification ID',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'updated_on' => 'Updated On',
            'created_on' => 'Created On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Bookings::className(), ['boarding' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings0()
    {
        return $this->hasMany(Bookings::className(), ['dropping' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerification()
    {
        return $this->hasOne(VerificationActions::className(), ['id' => 'verification_id']);
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
    public function getScheduleRoutes()
    {
        return $this->hasMany(ScheduleRoutes::className(), ['location_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedules::className(), ['location_to_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules0()
    {
        return $this->hasMany(Schedules::className(), ['location_from_id' => 'id']);
    }
}
