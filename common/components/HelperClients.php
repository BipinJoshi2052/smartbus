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
    public static function getOtherclients() {
        $client_id = [];
        $clients_exist = ClientPageContents::find()->asArray()->all();
        foreach ($clients_exist as $c => $k) {
            $client_id[] = $k['client_id'];
        }
//        $Clients = Clients::find()->asArray()->all();
//        foreach ($Clients as $a =>$k){
//            if(!in_array($k['id'],$client_id)) {
//                echo '<pre>';
//                print_r($k);
//                echo '</pre>';
//            }
//        }
//        die;

        return $client_id;
    }

    public static function getClients() {
        $clients = Clients::find()->asArray()->all();
        return $clients;
    }

    public static function getAllClientsManagement() {
        $clients = ClientPageContents::find()->asArray()->all();
        return $clients;
    }

    public static function getSingleClientsPage($id) {
        $singleClient = ClientPageContents::find()
                                          ->where('id = ' . $id)
                                          ->asArray()
                                          ->one();
        return $singleClient;
    }

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
            if ($upload != false) {
                $model->image = $upload;
            }
            else {
                Misc::setFlash('danger', 'Logo not uploaded. Please Try again');
            }

        }
        if (!($model->save() == false)) {
            return $model;
        }
        Misc::setFlash('danger', 'Data not uploaded. Please Try again');
        return false;

    }

    public static function setManagement($data) {
        if ($data['post']['id'] == '') {
            $model = new \common\models\ClientPageContents();
            $model->client_id = $data['post']['client_id'];
            $model->title = $data['post']['title'];
            $model->remark = $data['post']['remark'];
            $model->extra_notes = $data['post']['extra_notes'];
            $model->content = $data['post']['content'];
            $model->created_by = \Yii::$app->user->identity->id;
            $model->updated_by = \Yii::$app->user->identity->id;
            $model->updated_on = date('Y-m-d H:i:s');
            if ($model->save()) {
                return $model->id;
            }
            return false;

        }
        else {
            $id = $data['post']['id'];
            $model = ClientPageContents::findOne($id);
            $model->client_id = $data['post']['client_id'];
            $model->title = $data['post']['title'];
            $model->remark = $data['post']['remark'];
            $model->extra_notes = $data['post']['extra_notes'];
            $model->content = $data['post']['content'];
            $model->created_by = \Yii::$app->user->identity->id;
            $model->updated_by = \Yii::$app->user->identity->id;
            $model->updated_on = date('Y-m-d H:i:s');
            if ($model->save()) {
                return $model->id;
            }
            return false;
        }
    }

    public static function deleteClients($id) {
        $model = Clients::findOne($id);

        return $model->delete() ? json_encode(true) : json_encode(false);
    }

    public static function deleteClientsPage($id) {
        $model = \common\models\ClientPageContents::findOne($id);

        return $model->delete() ? json_encode(true) : json_encode(false);
    }
}