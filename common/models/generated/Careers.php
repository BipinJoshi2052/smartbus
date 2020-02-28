<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "{{%careers}}".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $age
 * @property string $city
 * @property string $phone
 * @property int $expected_salary
 * @property int $experience
 * @property string $website
 * @property string $other_details
 * @property string $file
 * @property int $is_new
 * @property string $created_on
 */
class Careers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%careers}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age', 'expected_salary', 'experience', 'is_new'], 'integer'],
            [['website', 'other_details'], 'string'],
            [['file'], 'required'],
            [['created_on'], 'safe'],
            [['name', 'email', 'city', 'phone'], 'string', 'max' => 200],
            [['file'], 'string', 'max' => 250],
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
            'email' => 'Email',
            'age' => 'Age',
            'city' => 'City',
            'phone' => 'Phone',
            'expected_salary' => 'Expected Salary',
            'experience' => 'Experience',
            'website' => 'Website',
            'other_details' => 'Other Details',
            'file' => 'File',
            'is_new' => 'Is New',
            'created_on' => 'Created On',
        ];
    }
}
