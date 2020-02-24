<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "schedule_departures".
 *
 * @property int $id
 * @property int $schedule_id
 * @property string $passenger_info
 * @property int $is_boarding
 * @property string $departed_on
 * @property int $boarding_closed
 * @property string $reached_on
 * @property string $current_location
 * @property int $problem_flag
 * @property string $problem_description
 * @property int $problem_reported_by
 * @property int $updated_by
 * @property string $updated_on
 * @property int $occupancy
 *
 * @property Schedules $schedule
 * @property User $problemReportedBy
 * @property User $updatedBy
 */
class ScheduleDepartures extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule_departures';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['schedule_id', 'departed_on', 'boarding_closed', 'reached_on', 'problem_description', 'problem_reported_by', 'updated_by', 'updated_on'], 'required'],
            [['schedule_id', 'is_boarding', 'boarding_closed', 'problem_flag', 'problem_reported_by', 'updated_by', 'occupancy'], 'integer'],
            [['passenger_info', 'current_location', 'problem_description'], 'string'],
            [['departed_on', 'reached_on', 'updated_on'], 'safe'],
            [['schedule_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schedules::className(), 'targetAttribute' => ['schedule_id' => 'id']],
            [['problem_reported_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['problem_reported_by' => 'id']],
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
            'schedule_id' => 'Schedule ID',
            'passenger_info' => 'Passenger Info',
            'is_boarding' => 'Is Boarding',
            'departed_on' => 'Departed On',
            'boarding_closed' => 'Boarding Closed',
            'reached_on' => 'Reached On',
            'current_location' => 'Current Location',
            'problem_flag' => 'Problem Flag',
            'problem_description' => 'Problem Description',
            'problem_reported_by' => 'Problem Reported By',
            'updated_by' => 'Updated By',
            'updated_on' => 'Updated On',
            'occupancy' => 'Occupancy',
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
    public function getProblemReportedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'problem_reported_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
