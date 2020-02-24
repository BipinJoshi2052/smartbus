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

use common\models\generated\ScheduleRoutes;
use common\models\Schedules;
use common\models\Vehicles;
use yii\base\Component;

class HelperSchedules extends Component {
    public static function set($json) {
        echo '<pre>';
        $data = json_decode($json, true);
        print_r($data);

        // [id] => 0
        // [vehicle_id] => 1
        // [departure] => 06-06-2019
        // [arrival] => 06-06-2019
        // [cancellation_note] =>
        // [additional_note] =>
        $new = true;
        if (isset($data['schedule']['id']) && $data['schedule']['id'] > 0) {
            $model = Schedules::findOne($data['schedule']['id']);
            $new = false;
        }
        else {
            $model = new Schedules();
            $new = true;
        }
        $startTime = '';
        $endTime = '';
        $vehicle = Vehicles::find()
                           ->select(['id', 'user_id', 'seats'])
                           ->where(['=', 'id', $data['schedule']['vehicle_id']])
                           ->one();
        $model->attributes = $data;
        $model->user_id = $vehicle->user_id;
        $model->vehicle_id = $vehicle->id;
        $model->created_at = date('Y-m-d H:i:s');
        if (isset($data['route'])) {
            $count = 0;
            foreach ($data['route'] as $k => $r) {
                if ($r['location'] != '' && $r['time'] != '') {
                    if ($count == 0) {
                        $startTime = $r['time'];
                    }
                    elseif ($count == (count($data['route']) - 1)) {
                        $endTime = $r['time'];
                    }

                    if (isset($r['boarding']) && $r['boarding'] == 'on') {
                        $data['route'][$k]['boarding'] = 1;
                    }
                    else {
                        $data['route'][$k]['boarding'] = 0;
                    }
                    if (isset($r['dropping']) && $r['dropping'] == 'on') {
                        $data['route'][$k]['dropping'] = 1;
                    }
                    else {
                        $data['route'][$k]['dropping'] = 0;
                    }
                }
                else {
                    unset($data['route'][$k]);
                }
                $count++;
            }
        }
        if (isset($data['price'])) {
            foreach ($data['price'] as $k => $p) {
                if (!($p['from'] > 0 && $p['to'] > 0 && $p['amount'] > 0)) {
                    unset($data['price'][$k]);
                }
            }
        }
        if ($startTime != '' && $endTime != '') {
            $startTime = strtotime(Misc::formatDate($data['departure']) . ' ' . $startTime);
            $endTime = strtotime(Misc::formatDate($data['arrival']) . ' ' . $endTime);
            $model->duration = Misc::timeDifference($startTime, $endTime);

            $model->departure = Misc::formatDate($data['departure']) . ' ' . $startTime;
            $model->arrival = Misc::formatDate($data['arrival']) . ' ' . $endTime;
        }
        if (isset($data['schedule']['seats'])) {
            $model->seats = $data['schedule']['seats'];
        }
        else {
            $seat_info = [];
            $vehicle_seat_info = json_decode($vehicle->seats);
            foreach ($vehicle_seat_info as $k => $vr) {
                foreach ($vr as $m => $vc) {
                    if ($vc != '') {
                        $seat_info[$vc] = [
                                "status"  => "v",
                                "booking" => ""
                        ];
                    }
                }
            }
            $model->seats = $seat_info;
        };

        if ($model->save() != false) {
            if (!Misc::requestModeration($model::tableName(), $model->id)) {
                $model->delete();
                die("Couldn't send moderation request");
            }
            if ($new) {
                if (isset($data['route'])) {
                    Misc::batchInsert('schedule_routes', $data['route']);
                }
                if (isset($data['price'])) {
                    Misc::batchInsert('schedule_prices', $data['price']);
                }
            }
            else {
                if (isset($data['route'])) {
                    foreach ($data['route'] as $k => $route) {
                        if (isset($route['id']) && $route['id'] > 0) {
                            $rModel = ScheduleRoutes::findOne($route['id']);
                        }
                        else {
                            $rModel = new ScheduleRoutes();
                        }
                        $rModel->attributes = $route;

                        if ($rModel->save() != false) {
//                            Misc::setFlash()
                        }

                    }
                }

                if (isset($data['price'])) {

                }

            }


        }
        print_r($data);
        print_r($model);

        Misc::setFlash('danger', 'Data not uploaded. Please Try again');
        die;
        return false;

    }
}