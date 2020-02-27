<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of settings
 * @author Chetan Rajbhandari
 */

namespace common\components;

use common\components\HelperUpload as Upload;
use common\models\Explore;
use common\models\Faq;
use yii\base\Component;
use common\models\User;

use Yii;

class HelperFaq extends Component {

    public static function getAll() {
        $faq = Faq::find()->all();
        return $faq;
    }
    public static function getOne($id) {
        $editable = Faq::find()->where(['=', 'id', $id])->one();
        return $editable;
    }
    public static function setFaq($post) {
        if (empty($post['id'])) {
            $model = new Faq;
            //title
            $model->title = $post['title'];
            //content
            $model->content = $post['content'];
            //is_active
            $model->is_active = $post['is_active'];
            //created_by
            $model->created_by = Yii::$app->user->identity->id;
            //updated_on
            $model->updated_at = date('Y-m-d H:i:s');
            //updated_by
            $model->updated_by = Yii::$app->user->identity->id;
            if ($model->save()) {
                $id = $model->id;
                return $id;
            }
            return false;
        }
        else {
            $id = $post['id'];
            $model = Faq::findOne($id);
            //title
            $model->title = $post['title'];
            //is_active
            $model->is_active = $post['is_active'];
            //content
            $model->content = $post['content'];
            //updated_on
            $model->updated_at = date('Y-m-d H:i:s');
            //updated_by
            $model->updated_by = Yii::$app->user->identity->id;

            if ($model->save()) {

                return $id;
            }
            return false;
        }
    }

    public static function getSiteExplore() {
        $faq = Faq::find()->where(['id' => 1])->all();
        return $faq;
    }



}