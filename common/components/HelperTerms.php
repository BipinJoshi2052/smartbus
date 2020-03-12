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
use common\models\Terms;
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




class HelperTerms extends Component {

    public static function addTerms($data) {
if($data['post']['id'] != '') {
    $model = Terms::findOne($data['post']['id']);
    $model->attributes = $data['post'];
    if ($model->save()) {
        return $model;
    }
}else {
    $model = new Terms();
    $model->attributes = $data['post'];
    if ($model->save()) {
        return $model;
    }
}
    }
public static function deleteSection($id) {
    $model = Terms::findOne($id);
    if ($model->delete()) {
        return json_encode(true);
    }
    return json_encode(false);
}
    public static function getAllTerms()
    {
     $model = Terms::find()->asArray()->all();
     return $model;
    }
    public static function getSingleTermsDetails($id) {
        $model=Terms::find()->where('id ='.$id)->asArray()->one();
        return $model;
    }
}
