<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "session".
 *
 * @property string $id
 * @property int $expire
 * @property resource $data
 */
class Session extends common\models\generated\Session
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

        ];
    }

}
