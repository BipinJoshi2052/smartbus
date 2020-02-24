<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "vendor_comments".
 *
 * @property int $id
 * @property int $vendor_id
 * @property int $customer_id
 * @property int $verification_id
 * @property int $is_verified
 * @property int $is_active
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $comment
 * @property string $created_on
 *
 * @property User $vendor
 * @property User $customer
 * @property VerificationComments $verification
 */
class VendorComments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendor_comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vendor_id', 'comment'], 'required'],
            [['vendor_id', 'customer_id', 'verification_id', 'is_verified', 'is_active'], 'integer'],
            [['comment'], 'string'],
            [['created_on'], 'safe'],
            [['name', 'email', 'phone'], 'string', 'max' => 255],
            [['vendor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['vendor_id' => 'id']],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['verification_id'], 'exist', 'skipOnError' => true, 'targetClass' => VerificationComments::className(), 'targetAttribute' => ['verification_id' => 'id']],
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
            'customer_id' => 'Customer ID',
            'verification_id' => 'Verification ID',
            'is_verified' => 'Is Verified',
            'is_active' => 'Is Active',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'comment' => 'Comment',
            'created_on' => 'Created On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(User::className(), ['id' => 'vendor_id']);
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
    public function getVerification()
    {
        return $this->hasOne(VerificationComments::className(), ['id' => 'verification_id']);
    }
}
