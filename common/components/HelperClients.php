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

use Codeception\Module\Cli;
use common\models\Clients;
use common\models\generated\ClientPageContents;
use yii\base\Component;

class HelperClients extends Component {
    //        public static function getOtherclients($id)
    //        {
    //            $otherClients = Clients::find()->where('id !='.$id)->all();
    //            return $otherClients;
    //        }
    public static function set($data, $image) {
        if (isset($data['id']) && $data['id'] > 0) {
            $model = Clients::findOne($data['id']);
        }
        else {
            $model = new Clients;
        }
        $model->attributes = $data;

        if (isset($image['name']) && $image['name'] != '') {
            if ($model->image != '') {
                Misc::delete_file($model->image, 'image');
            }
            $upload = HelperUpload::upload($image);
            if ($upload != FALSE) {
                $model->image = $upload;
            }
            else {
                Misc::setFlash('danger', 'Logo not uploaded. Please Try again');
            }

        }
        if (!($model->save() == FALSE)) {
            return $model;
        }
        Misc::setFlash('danger', 'Data not uploaded. Please Try again');
        return FALSE;

    }
    public static function setManagement($data)
    {
        if($data['post']['id'] == '') {
            $model = new \common\models\ClientPageContents();
            $model ->client_id=$data['post']['client_id'];
            $model->title = $data['post']['title'];
            $model->remark =$data['post']['remark'];
            $model->extra_notes =$data['post']['extra_notes'];
            $model->content =$data['post']['content'];
            $model->created_by= \Yii::$app->user->identity->id;
            $model->updated_by = \Yii::$app->user->identity->id;
            $model->updated_on = date('Y-m-d H:i:s');
            if($model->save()) {
            }
            return $model;

        }
    }
}