<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "user_details".
 *
 * @property int $id
 * @property int $user_id
 * @property string $company
 * @property string $address
 * @property string $phone
 * @property string $citizenship
 * @property string $license_no
 * @property string $images
 * @property double $commission_percentage
 * @property double $discount
 * @property string $allowed_gateways
 * @property string $contact_person_name
 * @property int $contact_person_phone
 * @property string $contact_person_email
 * @property string $company_registration_number
 * @property string $pan_number
 * @property int $is_vat
 *
 * @property Schedules[] $schedules
 * @property User $user
 */
class UserDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'contact_person_phone', 'is_vat'], 'integer'],
            [['company', 'images', 'allowed_gateways', 'contact_person_name', 'contact_person_email'], 'string'],
            [['commission_percentage', 'discount'], 'number'],
            [['address', 'phone'], 'string', 'max' => 255],
            [['citizenship', 'license_no', 'company_registration_number', 'pan_number'], 'string', 'max' => 64],
            [['user_id'], 'unique'],
            [['pan_number'], 'unique'],
            [['company_registration_number'], 'unique'],
            [['citizenship'], 'unique'],
            [['license_no'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'company' => 'Company',
            'address' => 'Address',
            'phone' => 'Phone',
            'citizenship' => 'Citizenship',
            'license_no' => 'License No',
            'images' => 'Images',
            'commission_percentage' => 'Commission Percentage',
            'discount' => 'Discount',
            'allowed_gateways' => 'Allowed Gateways',
            'contact_person_name' => 'Contact Person Name',
            'contact_person_phone' => 'Contact Person Phone',
            'contact_person_email' => 'Contact Person Email',
            'company_registration_number' => 'Company Registration Number',
            'pan_number' => 'Pan Number',
            'is_vat' => 'Is Vat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedules::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
