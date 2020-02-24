<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "permissions_old".
 *
 * @property int $id
 * @property int $role
 * @property string $controller
 * @property string $interface
 * @property string $display_name
 * @property int $c
 * @property int $r
 * @property int $u
 * @property int $d
 *
 * @property UserRoles $role0
 */
class PermissionsOld extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'permissions_old';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role', 'controller', 'interface'], 'required'],
            [['role', 'c', 'r', 'u', 'd'], 'integer'],
            [['display_name'], 'string'],
            [['controller'], 'string', 'max' => 128],
            [['interface'], 'string', 'max' => 4],
            [['role'], 'exist', 'skipOnError' => true, 'targetClass' => UserRoles::className(), 'targetAttribute' => ['role' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role' => 'Role',
            'controller' => 'Controller',
            'interface' => 'Interface',
            'display_name' => 'Display Name',
            'c' => 'C',
            'r' => 'R',
            'u' => 'U',
            'd' => 'D',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole0()
    {
        return $this->hasOne(UserRoles::className(), ['id' => 'role']);
    }
}
