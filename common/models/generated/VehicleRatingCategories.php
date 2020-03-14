<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "{{%vehicle_rating_categories}}".
 *
 * @property int $id
 * @property string $category
 * @property string $description
 * @property string $created_on
 * @property int $is_active
 *
 * @property VehicleRatings[] $vehicleRatings
 */
class VehicleRatingCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%vehicle_rating_categories}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['category', 'description'], 'string'],
            [['created_on'], 'safe'],
            [['is_active'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'description' => 'Description',
            'created_on' => 'Created On',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleRatings()
    {
        return $this->hasMany(VehicleRatings::className(), ['rating_type_id' => 'id']);
    }
}
