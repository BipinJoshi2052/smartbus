<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "advertisement".
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property string $alt_text
 * @property string $title
 * @property string $content
 * @property string $image
 * @property double $price
 * @property string $company
 * @property string $contact_person
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $display_on
 * @property int $display_order
 * @property int $created_by
 * @property string $created_on
 * @property string $expiring_on
 * @property int $is_active
 */
class Advertisement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advertisement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_by', 'expiring_on'], 'required'],
            [['name', 'alt_text', 'title', 'content', 'email', 'address', 'display_on'], 'string'],
            [['type', 'display_order', 'created_by', 'is_active'], 'integer'],
            [['price'], 'number'],
            [['created_on', 'expiring_on'], 'safe'],
            [['image', 'phone'], 'string', 'max' => 64],
            [['company', 'contact_person'], 'string', 'max' => 128],
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
            'type' => 'Type',
            'alt_text' => 'Alt Text',
            'title' => 'Title',
            'content' => 'Content',
            'image' => 'Image',
            'price' => 'Price',
            'company' => 'Company',
            'contact_person' => 'Contact Person',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'display_on' => 'Display On',
            'display_order' => 'Display Order',
            'created_by' => 'Created By',
            'created_on' => 'Created On',
            'expiring_on' => 'Expiring On',
            'is_active' => 'Is Active',
        ];
    }
}
