<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "verification_users".
 *
 * @property int $id
 * @property string $table_name
 * @property string $comment
 * @property string $verification_comment
 * @property int $verification_status
 * @property int $verified_by
 * @property string $verified_on
 * @property string $requested_on
 * @property int $requested_by
 *
 * @property User[] $users
 * @property User $verifiedBy
 * @property User $requestedBy
 */
class VerificationUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'verification_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['table_name', 'requested_by'], 'required'],
            [['comment', 'verification_comment'], 'string'],
            [['verification_status', 'verified_by', 'requested_by'], 'integer'],
            [['verified_on', 'requested_on'], 'safe'],
            [['table_name'], 'string', 'max' => 64],
            [['verified_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['verified_by' => 'id']],
            [['requested_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['requested_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table_name' => 'Table Name',
            'comment' => 'Comment',
            'verification_comment' => 'Verification Comment',
            'verification_status' => 'Verification Status',
            'verified_by' => 'Verified By',
            'verified_on' => 'Verified On',
            'requested_on' => 'Requested On',
            'requested_by' => 'Requested By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['verification_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerifiedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'verified_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'requested_by']);
    }
}
