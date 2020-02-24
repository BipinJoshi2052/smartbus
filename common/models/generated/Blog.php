<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "{{%blog}}".
 *
 * @property int $id
 * @property int $category_id
 * @property string $slug
 * @property string $title
 * @property string $subtitle
 * @property string $post_content
 * @property string $image
 * @property int $is_active
 * @property int $created_by
 * @property string $created_on
 * @property string $updated_on
 * @property int $updated_by
 *
 * @property BlogCategories $category
 * @property User $updatedBy
 * @property User $createdBy
 * @property BlogComments[] $blogComments
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%blog}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'is_active', 'created_by', 'updated_by'], 'integer'],
            [['slug', 'title', 'post_content', 'is_active', 'created_by'], 'required'],
            [['subtitle', 'post_content'], 'string'],
            [['created_on', 'updated_on'], 'safe'],
            [['slug'], 'string', 'max' => 255],
            [['title', 'image'], 'string', 'max' => 200],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlogCategories::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'slug' => 'Slug',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'post_content' => 'Post Content',
            'image' => 'Image',
            'is_active' => 'Is Active',
            'created_by' => 'Created By',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(BlogCategories::className(), ['id' => 'category_id']);
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
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogComments()
    {
        return $this->hasMany(BlogComments::className(), ['blog_id' => 'id']);
    }
}
