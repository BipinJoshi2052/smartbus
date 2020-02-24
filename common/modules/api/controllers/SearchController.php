<?php

namespace common\modules\api\controllers;

use \common\modules\api\components\HelperAPI;
//use common\components\HelperAPI;
use common\components\Misc;
use common\components\Query;
use common\models\Amenities;
use common\models\Schedules;
use common\models\VehicleTypes;
use common\modules\models\Bookings;
use yii\web\Response;

class SearchController extends \yii\web\Controller {
    public $enableCsrfValidation = false;

    public function actionIndex() {
        echo 'ok';
        //return $this->render('index');
    }

    public function actionPlaces() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $locations = [];

        if (isset($_GET['term']) && $_GET['term'] != '') {
            $sql = "SELECT * FROM `locations` WHERE `name` LIKE '" . $_GET['term'] . "%'";
            $locations = Query::queryAll($sql);
        }


        return $locations;
    }

    public function actionCities() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $locations = [];

        if (isset($_GET['term']) && $_GET['term'] != '') {
            $sql = "SELECT  * FROM `locations` WHERE `city` LIKE '%" . $_GET['term'] . "%'  AND is_active=1  GROUP BY(city) ";
            $locations = Query::queryAll($sql);
            $return = [];
            if (!empty($locations)) {
                foreach ($locations as $l) {
                    $return[] = [
                            'id'          => $l['city'],
                            'name'        => $l['city'],
                            'description' => $l['district'] . ', ' . $l['zone']
                    ];
                }
            }
        }


        return $return;
    }

    public function actionVehicleTypes() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return VehicleTypes::find()
                           ->where('is_verified = 1')
                           ->all();
    }

    public function actionAmenities() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return Amenities::find()
                        ->where('is_verified = 1')
                        ->all();
    }

    public function actionPosFilters() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $filters = [
                'amenities'     => Amenities::find()
                                            ->where('is_verified = 1')
                                            ->all(),
                'vehicle-types' => VehicleTypes::find()
                                               ->where('is_verified = 1')
                                               ->all()
        ];

        return $filters;
    }

    public function actionTickets() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $result = [];

        $post = \Yii::$app->request->post('post');
        if ($post != '') {
            $parameters = Misc::json_decode($post);
        }
        if ((isset($parameters['from']) && $parameters['from'] != '') && (isset($parameters['to']) && $parameters['to'] != '')) {
            $schedules = HelperAPI:: getSchedules($parameters);
        }
        else {
            $schedules = ['error' => 'Improper Request', 'parameters' => $parameters];
        }
        return $schedules;
    }


}
