<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "schedule_routes".
 *
 * @property int $id
 * @property int $order_index
 * @property int $schedule_id
 * @property int $location_id
 * @property string $time
 * @property string $description
 * @property int $is_boarding
 * @property int $is_dropping
 *
 * @property Schedules $schedule
 * @property Locations $location
 */
class ScheduleRoutes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule_routes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_index', 'schedule_id', 'location_id', 'is_boarding', 'is_dropping'], 'integer'],
            [['schedule_id', 'location_id', 'time', 'is_boarding', 'is_dropping'], 'required'],
            [['time'], 'safe'],
            [['description'], 'string'],
            [['schedule_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schedules::className(), 'targetAttribute' => ['schedule_id' => 'id']],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Locations::className(), 'targetAttribute' => ['location_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_index' => 'Order Index',
            'schedule_id' => 'Schedule ID',
            'location_id' => 'Location ID',
            'time' => 'Time',
            'description' => 'Description',
            'is_boarding' => 'Is Boarding',
            'is_dropping' => 'Is Dropping',
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
    public function getLocation()
    {
        return $this->hasOne(Locations::className(), ['id' => 'location_id']);
    }
}
