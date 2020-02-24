<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "vehicles_hire".
 *
 * @property int $id
 * @property int $type type
 * @property string $number_plate
 * @property string $bluebook_num
 * @property string $registration_date
 * @property string $model
 * @property string $manufacturer
 * @property string $description
 * @property string $amenities
 * @property int $seat_count
 * @property string $contact_info
 * @property string $image
 * @property string $images
 * @property string $created_on
 * @property int $created_by
 * @property int $updated_by
 * @property int $updated_on
 */
class VehiclesHire extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicles_hire';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'number_plate', 'bluebook_num', 'registration_date', 'seat_count', 'contact_info', 'created_by'], 'required'],
            [['type', 'seat_count', 'created_by', 'updated_by', 'updated_on'], 'integer'],
            [['registration_date', 'created_on'], 'safe'],
            [['description', 'amenities', 'contact_info', 'images'], 'string'],
            [['number_plate', 'bluebook_num', 'manufacturer'], 'string', 'max' => 64],
            [['model'], 'string', 'max' => 128],
            [['image'], 'string', 'max' => 255],
            [['number_plate'], 'unique'],
            [['bluebook_num'], 'unique'],
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
            'number_plate' => 'Number Plate',
            'bluebook_num' => 'Bluebook Num',
            'registration_date' => 'Registration Date',
            'model' => 'Model',
            'manufacturer' => 'Manufacturer',
            'description' => 'Description',
            'amenities' => 'Amenities',
            'seat_count' => 'Seat Count',
            'contact_info' => 'Contact Info',
            'image' => 'Image',
            'images' => 'Images',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'updated_on' => 'Updated On',
        ];
    }
}
