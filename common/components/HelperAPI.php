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

use common\models\Bookings;
use common\models\Pages;
use common\models\Schedules;
use common\models\Settings;
use yii\base\Component;

class HelperAPI extends Component {
    public static function cUrl($url, $post = '') {
        $request = curl_init();
        curl_setopt($request, CURLOPT_URL, \Yii::$app->params['api_path'] . $url);

        if (!is_array($post) && $post != '') {
            curl_setopt($request, CURLOPT_POST, 1);
            curl_setopt($request, CURLOPT_POSTFIELDS, $post);
        }
        curl_setopt($request, CURLOPT_FORBID_REUSE, false);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        // print_r($request);
        $response = curl_exec($request);
        if (curl_errno($request)) {
            die('Couldn\'t send request: ' . curl_error($request));
        }
        else {
            // check the HTTP status code of the request
            $resultStatus = curl_getinfo($request, CURLINFO_HTTP_CODE);
            if ($resultStatus == 200) {
                // everything went better than expected
            }
            else {
                die('Request failed: HTTP status code: ' . $resultStatus);
            }
        }
        curl_close($request);
        return ($response != '') ? $response : false;
    }


    public static function getAmenities() {
        return self::cUrl(\Yii::$app->params['api_path'] . '/search/amenities');
    }

    public static function getVehicleTypes() {
        return self::cUrl(\Yii::$app->params['api_path'] . '/search/vehicle-types');
    }

    public static function searchTickets($parameters) {
        return self::cUrl(\Yii::$app->params['api_path'] . '/search/search-tickets', json_encode($parameters));
    }

    public static function getSchedule($parameters) {
        return self::cUrl(\Yii::$app->params['api']['url'] . '/schedules/update', $parameters);
    }

}