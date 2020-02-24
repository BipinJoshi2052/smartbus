<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "vehicle_hire".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $created_at
 * @property string $description
 * @property string $number_plate
 * @property string $image
 */
class VehicleHire extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle_hire';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'description', 'number_plate', 'image'], 'required'],
            [['name', 'description'], 'string'],
            [['created_at'], 'safe'],
            [['type', 'image'], 'string', 'max' => 120],
            [['number_plate'], 'string', 'max' => 64],
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
            'type' => 'Type',
            'created_at' => 'Created At',
            'description' => 'Description',
            'number_plate' => 'Number Plate',
            'image' => 'Image',
        ];
    }
}
