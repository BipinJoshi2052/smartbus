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

use common\models\Explore;
use yii\base\Component;
use common\models\User;
use common\components\HelperUpload as Upload;
use Yii;

class HelperExplore extends Component {

    public static function getAll() {
        $explore = Explore::find()->all();
        return $explore;
    }
    public static function getOne($id) {
        $editable = Explore::find()->where(['=', 'id', $id])->one();
        return $editable;
    }
    public static function setExplore($post, $image) {
        if (empty($post['id'])) {
            $model = new Explore;
            //title
            $model->title = $post['title'];
            //is_active
            //description
            $model->description =$post['description'];
            $model->is_active = $post['is_active'];
            //created_by
            $model->created_by = Yii::$app->user->identity->id;
            //updated_on
            $model->updated_on = date('Y-m-d H:i:s');
            //updated_by
            $model->updated_by = Yii::$app->user->identity->id;
            if ($model->save()) {
                $id = $model->id;
                if (isset($image['name']) && strlen(trim($image['name'])) > 0) {
                    $file = $image;
                    if ($id > 0) {
                        $model = Explore::findOne($id);
                        // Upload New file
                        $up = Upload::upload($file);
                        if ($up) {
                            $model->image = $up;
                            $model->save(false);
                        }
                    }
                }
                return $id;
            }
            return false;
        }
        else {
            $id = $post['id'];
            $model = Explore::findOne($id);
            //title
            $model->title = $post['title'];
            //is_active
            $model->is_active = $post['is_active'];

            //updated_on
            $model->updated_on = date('Y-m-d H:i:s');
            //updated_by
            $model->updated_by = Yii::$app->user->identity->id;

            if ($model->save()) {
                if (isset($image['name']) && strlen(trim($image['name'])) > 0) {
                    $file = $image;
                    if ($id > 0) {
                        $model = Explore::findOne($id);
                        // Upload New file
                        $up = Upload::upload($file);

                        if ($up) {
                            $model->image = $up;
                            $model->save(false);
                        }

                    }
                }
                return $id;
            }
            return false;
        }
    }

    public static function getSiteExplore() {
        $explore = Explore::find()->where(['is_active' => 1])->all();
        return $explore;
    }

}