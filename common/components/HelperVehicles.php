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

use common\models\Vehicles;
use common\models\VehicleTypes;
use yii\base\Component;

class HelperVehicles extends Component {
    public static function set($data, $seats, $image) {
        if (isset($data['id']) && $data['id'] > 0) {
            $model = Vehicles::findOne($data['id']);
        }
        else {
            $model = new Vehicles();
        }
        $model->attributes = $data;

        $count = 0;
        if (count($seats) > 0) {
            foreach ($seats as $rows) {
                foreach ($rows as $col) {
                    if ($col != '') {
                        $count++;
                    }
                }
            }

            $model->seats = json_encode($seats);
        }
        $model->seat_count = $count;
        if (isset($image['name']) && $image['name'] != '') {
            if ($model->image != '') {
                Misc::delete_file($model->image, 'image');
            }
            $upload = HelperUpload::upload($image);
            if ($upload != false) {
                $model->image = $upload;
            }
            else {
                Misc::setFlash('danger', 'Image not uploaded. Please Try again');
            }

        }
        $model->created_at = date('Y-m-d H:i:s');
        if (!($model->save() == false)) {
            return $model;
        }
        Misc::setFlash('danger', 'Data not uploaded. Please Try again');
        return false;

    }

}