<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "vehicles".
 *
 * @property int $id
 * @property int $type
 * @property int $user_id
 * @property string $number_plate
 * @property string $bluebook_num
 * @property string $registration_date
 * @property string $model
 * @property string $manufacturer
 * @property string $description
 * @property string $amenities
 * @property int $seat_count
 * @property string $seat_map
 * @property string $seats
 * @property string $contact_info
 * @property string $image
 * @property string $images
 * @property int $verification_id
 * @property int $is_active
 * @property int $is_verified
 * @property string $created_on
 * @property int $created_by
 * @property int $updated_by
 * @property string $updated_on
 *
 * @property Schedules[] $schedules
 * @property VehicleComments[] $vehicleComments
 * @property VehicleRatings[] $vehicleRatings
 * @property VehicleTypes $type0
 * @property User $user
 * @property VerificationActions $verification
 * @property User $updatedBy
 * @property User $createdBy
 */
class Vehicles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'user_id', 'number_plate', 'bluebook_num', 'registration_date', 'contact_info'], 'required'],
            [['type', 'user_id', 'seat_count', 'verification_id', 'is_active', 'is_verified', 'created_by', 'updated_by'], 'integer'],
            [['registration_date', 'created_on', 'updated_on'], 'safe'],
            [['description', 'amenities', 'seats', 'contact_info', 'images'], 'string'],
            [['number_plate', 'bluebook_num', 'manufacturer'], 'string', 'max' => 64],
            [['model', 'seat_map'], 'string', 'max' => 128],
            [['image'], 'string', 'max' => 255],
            [['number_plate'], 'unique'],
            [['bluebook_num'], 'unique'],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleTypes::className(), 'targetAttribute' => ['type' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['verification_id'], 'exist', 'skipOnError' => true, 'targetClass' => VerificationActions::className(), 'targetAttribute' => ['verification_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
            'type' => 'Type',
            'user_id' => 'User ID',
            'number_plate' => 'Number Plate',
            'bluebook_num' => 'Bluebook Num',
            'registration_date' => 'Registration Date',
            'model' => 'Model',
            'manufacturer' => 'Manufacturer',
            'description' => 'Description',
            'amenities' => 'Amenities',
            'seat_count' => 'Seat Count',
            'seat_map' => 'Seat Map',
            'seats' => 'Seats',
            'contact_info' => 'Contact Info',
            'image' => 'Image',
            'images' => 'Images',
            'verification_id' => 'Verification ID',
            'is_active' => 'Is Active',
            'is_verified' => 'Is Verified',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'updated_on' => 'Updated On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedules::className(), ['vehicle_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleComments()
    {
        return $this->hasMany(VehicleComments::className(), ['vehicle_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleRatings()
    {
        return $this->hasMany(VehicleRatings::className(), ['vehicle_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(VehicleTypes::className(), ['id' => 'type']);
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
    public function getVerification()
    {
        return $this->hasOne(VerificationActions::className(), ['id' => 'verification_id']);
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
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
