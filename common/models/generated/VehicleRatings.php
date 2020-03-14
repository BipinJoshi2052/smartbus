<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "{{%vehicle_ratings}}".
 *
 * @property int $id
 * @property int $vendor_id
 * @property int $vehicle_id
 * @property int $rating_type_id
 * @property int $customer_id
 * @property int $booking_id
 * @property int $rating_group
 * @property int $rating
 * @property string $created_on
 *
 * @property VehicleRatingCategories $ratingType
 * @property Vehicles $vehicle
 * @property User $customer
 * @property User $vendor
 */
class VehicleRatings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%vehicle_ratings}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vendor_id', 'vehicle_id', 'rating_type_id', 'rating'], 'required'],
            [['vendor_id', 'vehicle_id', 'rating_type_id', 'customer_id', 'booking_id', 'rating_group', 'rating'], 'integer'],
            [['created_on'], 'safe'],
            [['rating_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleRatingCategories::className(), 'targetAttribute' => ['rating_type_id' => 'id']],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicles::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['vendor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['vendor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vendor_id' => 'Vendor ID',
            'vehicle_id' => 'Vehicle ID',
            'rating_type_id' => 'Rating Type ID',
            'customer_id' => 'Customer ID',
            'booking_id' => 'Booking ID',
            'rating_group' => 'Rating Group',
            'rating' => 'Rating',
            'created_on' => 'Created On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatingType()
    {
        return $this->hasOne(VehicleRatingCategories::className(), ['id' => 'rating_type_id']);
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
    public function getCustomer()
    {
        return $this->hasOne(User::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(User::className(), ['id' => 'vendor_id']);
    }
}
