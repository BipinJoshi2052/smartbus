<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Chetan Rajbhandari
 */

namespace common\components;

use common\components\Email as Email;
use common\models\Privacy;
use common\models\UserDetails;
use Yii;
use yii\base\Component;
use common\components\Query;
use common\components\Misc;
use common\models\User as User;
use yii\bootstrap\Html;
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use  yii\web\UrlManager;




class HelperPrivacy extends Component {

    public static function addPrivacy($data) {
if($data['post']['id'] != '') {
    $model = Privacy::findOne($data['post']['id']);
    $model->attributes = $data['post'];
    if ($model->save()) {
        return $model;
    }
}else {

    $model = new Privacy();
    $model->attributes = $data['post'];
    if ($model->save()) {
        return $model;
    }
    echo '<pre>';
    print_r($model->getErrors());
    echo '</pre>';
    die;
}
    }
public static function deleteSection($id) {
    $model = Privacy::findOne($id);
    if ($model->delete()) {
        return json_encode(true);
    }
    return json_encode(false);
}
    public static function getAllPrivacy()
    {
     $model = Privacy::find()->asArray()->all();
     return $model;
    }
    public static function getSinglePrivacyDetails($id) {
        $model=Privacy::find()->where('id ='.$id)->asArray()->one();
        return $model;
    }
}
