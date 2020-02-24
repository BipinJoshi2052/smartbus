<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "client_page_contents".
 *
 * @property int $id
 * @property int $client_id
 * @property string $title
 * @property string $remark
 * @property string $extra_notes
 * @property string $content
 * @property string $created_on
 * @property int $created_by
 * @property string $updated_on
 * @property int $updated_by
 *
 * @property User $updatedBy
 * @property Clients $client
 */
class ClientPageContents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_page_contents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'content'], 'required'],
            [['client_id', 'created_by', 'updated_by'], 'integer'],
            [['title', 'remark', 'extra_notes', 'content'], 'string'],
            [['created_on', 'updated_on'], 'safe'],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'title' => 'Title',
            'remark' => 'Remark',
            'extra_notes' => 'Extra Notes',
            'content' => 'Content',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'updated_on' => 'Updated On',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['id' => 'client_id']);
    }
}
