<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property int $id
 * @property int $category_id
 * @property string $slug
 * @property string $title
 * @property string $subtitle
 * @property string $post_content
 * @property int $is_active
 * @property string $image
 * @property int $created_by
 * @property string $created_on
 * @property string $updated_on
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property NewsCategories $category
 * @property User $updatedBy
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'is_active', 'created_by', 'updated_by'], 'integer'],
            [['slug', 'title', 'post_content', 'created_by'], 'required'],
            [['subtitle', 'post_content', 'image'], 'string'],
            [['created_on', 'updated_on'], 'safe'],
            [['slug'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 200],
            [['slug'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsCategories::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => 'Category ID',
            'slug' => 'Slug',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'post_content' => 'Post Content',
            'is_active' => 'Is Active',
            'image' => 'Image',
            'created_by' => 'Created By',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
            'updated_by' => 'Updated By',
        ];
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
    public function getCategory()
    {
        return $this->hasOne(NewsCategories::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
