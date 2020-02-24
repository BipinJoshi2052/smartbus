<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "{{%blog_comments}}".
 *
 * @property int $id
 * @property int $blog_id
 * @property int $customer_id
 * @property int $is_active
 * @property int $is_verified
 * @property string $verification_comment
 * @property int $verified_by
 * @property string $verified_on
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $comment
 * @property string $created_on
 *
 * @property Blog $blog
 * @property User $customer
 */
class BlogComments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%blog_comments}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_id', 'comment'], 'required'],
            [['blog_id', 'customer_id', 'is_active', 'is_verified', 'verified_by'], 'integer'],
            [['verification_comment', 'comment'], 'string'],
            [['verified_on', 'created_on'], 'safe'],
            [['name', 'email', 'phone'], 'string', 'max' => 255],
            [['blog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Blog::className(), 'targetAttribute' => ['blog_id' => 'id']],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'blog_id' => 'Blog ID',
            'customer_id' => 'Customer ID',
            'is_active' => 'Is Active',
            'is_verified' => 'Is Verified',
            'verification_comment' => 'Verification Comment',
            'verified_by' => 'Verified By',
            'verified_on' => 'Verified On',
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
    public function getBlog()
    {
        return $this->hasOne(Blog::className(), ['id' => 'blog_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(User::className(), ['id' => 'customer_id']);
    }
}
