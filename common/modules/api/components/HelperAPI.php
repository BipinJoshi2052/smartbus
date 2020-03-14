<?php


/**
 * @author Chetan Rajbhandari
 */

namespace common\modules\api\components;

use common\components\Helper;
use common\components\Misc;
use common\models\Amenities;
use common\models\generated\UserRoles;
use common\models\Pages;
use common\models\Permissions;

use common\models\Schedules;
use common\models\Settings;
use common\models\User;
use common\models\UserDetails;
use common\models\Vehicles;
use common\modules\api\controllers\SearchController;
use common\modules\api\models\Bookings;
use Yii;
use Yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseJson;

class HelperAPI extends Component {
    public static function btGetSeats($seats) {

        return Misc::json_encode($seats);

    }

    public static function getBookerId($token) {
        $u = User::findIdentityByAccessToken($token);

        return (!empty ($u)) ? $u->id : null;
    }

    public static function bookTicket($data) {

        $s = Schedules::findOne(['id' => Misc::decrypt($data['scheduleId'])]);

        $new_id = Misc::getNextId('bookings');
           
        $processed = [
                'booking_code'      => Yii::$app->params['booking_code']['prefix'] . $new_id . Yii::$app->params['booking_code']['suffix'],
                'schedule_id'       => $s['id'],
                'booker_id'         => self::getBookerId($data['token']),
                'booking_status'    => 1,
                'price'             => $data['price'],
                'boarding'          => $data['locations']['boarding'],
                'dropping'          => $data['locations']['dropping'],
                'payment'           => json_encode($data['payment']),
                'seats'             => self::btGetSeats($data['seats']),
                'seat_count'        => count($data['seats']),
                'name'              => $data['booker']['name'],
                'phone'             => $data['booker']['phone'],
                'email'             => $data['booker']['email'],
                'requests'          => $data['booker']['requests'],
                'can_cancel_ticket' => 1,
        ];

        $booking = new \common\models\Bookings();

        // $booking->scenario = Bookings::SCENARIO_BOOK;
        $booking->attributes = $processed;
//        echo '<pre>';
//        print_r($s->seats);
//        echo '</pre>';
        $s->seats = self::btFormatSeats($s->seats, $data, $new_id);
//        echo '<pre>';
//        print_r($s->seats);
//        echo '</pre>';
//        die;
        if ($booking->validate()) {
            if ($booking->save() && $s->save()) {
                $b = ArrayHelper::toArray($booking);
                $b['seat_names'] = $ids = implode(',', ArrayHelper::getColumn($data['seats'], 'name'));
                $b['status'] = true;
                return $b;
            }

        }
        return [
                'status' => false,
                'errors' => [
                        'schedule' => ArrayHelper::toArray($s->getErrors()),
                        'booking'  => ArrayHelper::toArray($booking->getErrors())
                ]
        ];

        //return $data;
        // return $processed;
    }

    public static function btFormatSeats($seats, $data, $bid) {
        $s = Misc::json_decode($seats);
        $chosen = $data['seats'];
        $seats = ArrayHelper::index($s, 'id');

        foreach ($chosen as $ch) {
            if (isset($seats[$ch['id']])) {
                $seats[$ch['id']]['booking'] = [
                        "booking_id" => $bid,
                        "temporary"  => false,
                        "time"       => date('Y-m-d H:i:s'),
                        "passenger"  => [
                                "name" => $ch['passenger']['name'],
                                "age"  => $ch['passenger']['age'],
                                "sex"  => $ch['passenger']['gender'],
                        ]
                ];
            }
        }
        return Misc::json_encode($seats);
    }


    public
    static function checkUser($username, $password) {
        $user = User::findByUsername($username);
        if ($user && $user->validatePassword($password)) {
            return true;
        }
        return false;
    }

    public
    static function getAmenities() {
        $p = [];
        $a = Amenities::find()
                      ->where('is_verified = 1')
                      ->asArray()
                      ->all();
        if (!empty($a)) {
            foreach ($a as $k => $x) {
                $p[$x['id']] = $x;
            }
        }
        return $p;
    }

    public
    static function formatAmenities($amenities) {
        $r = [];
        $va = Misc::json_decode($amenities);
        if (is_array($va) && count($va) > 0) {
            $aa = self::getAmenities();
            foreach ($va as $k => $x) {
                if (isset($aa[$x])) {
                    $r[$k] = [
                            'name'        => ($aa[$x]['display_name'] != '') ? $aa[$x]['display_name'] : $aa[$x]['name'],
                            'icon'        => $aa[$x]['icon'],
                            'description' => $aa[$x]['description'],
                    ];


                }
            }
        }

        return $r;
    }

    public
    static function formatRoute($data) {
        $route = [];
        if (is_array($data) && !empty($data)) {
            foreach ($data as $srk => $sr) {
                $route[$srk] = [
                        'is_boarding' => $sr['is_boarding'],
                        'is_dropping' => $sr['is_dropping'],
                        'time'        => Misc::time_Hia($sr['time']),
                        'location'    => [
                            //                                'id'        => $sr['location']['id'],
                            'name'        => $sr['location']['name'],
                            'street'      => $sr['location']['street'],
                            'city'        => $sr['location']['city'],
                            'district'    => $sr['location']['district'],
                            //                                'zone'        => $sr['location']['zone'],
                            'state'       => $sr['location']['state'],
                            //                                'longitude'   => $sr['location']['longitude'],
                            //                                'latitude'    => $sr['location']['latitude'],
                            'description' => $sr['location']['description'],
                        ]
                ];

                //                if ($sr['is_boarding'] == 1) {
                //                    array_push($boarding, $route[$srk]);
                //                }
                //                if ($sr['is_dropping'] == 1) {
                //                    array_push($dropping, $route[$srk]);
                //                }
            }
        }
        return $route;

    }

    public
    static function formatBookings($data) {
        $bookings = $data;
        return $bookings;
    }

    public
    static function formatRatings($data) {
        //  return $data;
        $score = 0;
        $ratings = [];
        //        echo json_encode($data);die;
        if (!empty($data) && count($data) > 0) {
            foreach ($data as $k => $d) {
                $score += $d['rating'];
                $ratings[$d['rating_type_id']]['type'] = $d['ratingType']['category'];
                if (!isset($ratings[$d['rating_type_id']]['score'])) {
                    $ratings[$d['rating_type_id']]['score'] = 0;
                }
                if (!isset($ratings[$d['rating_type_id']]['count'])) {
                    $ratings[$d['rating_type_id']]['count'] = 0;
                }
                if (!isset($ratings[$d['rating_type_id']]['count'])) {
                    $ratings[$d['rating_type_id']]['count'] = 0;
                }
                $ratings[$d['rating_type_id']]['score'] += $d['rating'];
                $ratings[$d['rating_type_id']]['count'] += 1;
                $ratings[$d['rating_type_id']]['rating'] = round($ratings[$d['rating_type_id']]['score'] / $ratings[$d['rating_type_id']]['count']);
            }

        }
        return $ratings;
    }

    public
    static function formatComments($data) {
        $comments = [];
        foreach ($data as $k => $d) {
            $comments[$k] = [
                    'comment' => $d['comment'],
                    'name'    => $d['name'],
                    'date'    => Misc::date_HiaDdMy($d['created_on']),
            ];
        }
        return $comments;
    }

    public
    static function getSeatCount($seats, $vehicle) {
        $reservations = [];
        $count = 0;
        $bookings = 0;

        if (!empty($seats)) {
            foreach ($seats as $k => $s) {

                if ($s['status'] === "1") {
                    $count++;
                    if (!isset($reservations[$s['reservation']])) {
                        $reservations[$s['reservation']] = 0;
                    }
                    $reservations[$s['reservation']]++;
                }
                if (isset($s['booking'])) {
                    if (isset($s['booking']['type'])
                            && $s['booking']['type'] == 'temporary'
                            && isset($s['booking']['time'])
                            && (strtotime(date('Y-m-d H:i:s'))) < ((strtotime("+" . (Yii::$app->params['settings']['seat_hold_interval']) . " minutes", strtotime($s['booking']['time']))))) {
                        $bookings++;
                    }
                    else {
                        $bookings++;
                    }


                }


            }
        }
        return [
                'dimensions'   => [
                        'height' => (isset(Yii::$app->params['vehicle-layout'][$vehicle['seat_map']])) ? Yii::$app->params['vehicle-layout'][$vehicle['seat_map']]['height'] : Yii::$app->params['vehicle-layout']['default']['height'],
                        'width'  => (isset(Yii::$app->params['vehicle-layout'][$vehicle['seat_map']])) ? Yii::$app->params['vehicle-layout'][$vehicle['seat_map']]['width'] : Yii::$app->params['vehicle-layout']['default']['width']
                ],
                'count'        => $count,
                'reservations' => $reservations,
                'bookings'     => $bookings
        ];
    }

    public
    static function formatFirstLastRoutePoints($route) {
        return [reset($route), end($route)];
    }

    public
    static function formatSchedules($schedules) {
        $formatted = [];
        foreach ($schedules as $sk => $sd) {
            $formatted[$sk] = [
                    'id'            => Misc::encrypt($sd['id']),
                    'duration'      => $sd['duration'],
                    'departure'     => $sd['departure'],
                    'arrival'       => $sd['arrival'],
                    'location_from' => $sd['location_from'],
                    'location_to'   => $sd['location_to'],
                    'company'       => ucwords($sd['user']['userDetails']['company']),
                    //                    'additional_note' => $sd['additional_note'],
                    /*  'cancellation'    => [
                              'notes' => $sd['cancellation_note'],
                              'rates' => $sd['cancellation_rates'],
                      ],*/

                    //                    'drivers_info' => $sd['drivers_info'],
                    'seats'         => [
                            'size' => self::getSeatCount(($sd['seats'] != '') ? Misc::json_decode($sd['seats']) : (($sd['vehicle']['seats']) ? Misc::json_decode($sd['vehicle']['seats']) : []), $sd['vehicle']),
                            //  'layout' => ($sd['seats'] != '') ? Misc::json_decode($sd['seats']) : (($sd['vehicle']['seats'] != '') ? Misc::json_decode($sd['vehicle']['seats']) : [])

                    ],

                    'vehicle' => [
                            'number_plate' => strtoupper($sd['vehicle']['number_plate']),
                            //                            'description'  => $sd['vehicle']['description'],
                            //                            'image'        => ($sd['vehicle']['image'] != '') ? Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $sd['vehicle']['image'] : '',
                            //                            'contact_info' => $sd['vehicle']['contact_info'],
                            'model'        => $sd['vehicle']['manufacturer'] . ' - ' . $sd['vehicle']['model'],
                            'type'         => [
                                    'name' => $sd['vehicle']['vehicleType']['name'],
                                    //                                    'remark' => $sd['vehicle']['vehicleType']['remark'],
                            ],
                            'amenities'    => ($sd['vehicle']['amenities'] != '') ? self::formatAmenities($sd['vehicle']['amenities']) : [],
                            'ratings'      => (isset($sd['vehicle']['vehicleRatings']) && !empty($sd['vehicle']['vehicleRatings'])) ? self::formatRatings($sd['vehicle']['vehicleRatings']) : [],
                            //                            'comments'     => (isset($sd['vehicle']['vehicleComments']) && !empty($sd['vehicle']['vehicleComments'])) ? $sd['vehicle']['vehicleComments'] : []
                    ],
                    // 'bookings' => (isset($sd['bookings']) && is_array($sd['bookings']) && !empty($sd['bookings'])) ? self::formatBookings($sd['bookings']) : [],
                    'route'   => (isset($sd['scheduleRoutes']) && is_array($sd['scheduleRoutes']) && !empty($sd['scheduleRoutes']) && $sd['prices'] != '') ? self::formatFirstLastRoutePoints($sd['scheduleRoutes']) : [],
                    //                    'prices'  => ($sd['prices'] != '') ? self::formatPrices($sd['prices']) : []
            ];
        }
        return $formatted;
    }

    public
    static function formatSchedule($sd) {
        return [
                'id'              => Misc::encrypt($sd['id']),
                'duration'        => $sd['duration'],
                'departure'       => $sd['departure'],
                'arrival'         => $sd['arrival'],
                'location_from'   => $sd['location_from'],
                'location_to'     => $sd['location_to'],
                'company'         => ucwords($sd['user']['userDetails']['company']),
                'additional_note' => $sd['additional_note'],
                'cancellation'    => [
                        'notes' => $sd['cancellation_note'],
                        'rates' => $sd['cancellation_rates'],
                ],

                'drivers_info' => $sd['drivers_info'],
                'seats'        => [
                        'size'   => self::getSeatCount(($sd['seats'] != '') ? Misc::json_decode($sd['seats']) : (($sd['vehicle']['seats']) ? Misc::json_decode($sd['vehicle']['seats']) : []), $sd['vehicle']),
                        'layout' => ($sd['seats'] != '') ? Misc::json_decode($sd['seats']) : (($sd['vehicle']['seats'] != '') ? Misc::json_decode($sd['vehicle']['seats']) : [])
                ],

                'vehicle' => [
                        'number_plate' => strtoupper($sd['vehicle']['number_plate']),
                        'description'  => $sd['vehicle']['description'],
                        'image'        => ($sd['vehicle']['image'] != '') ? Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $sd['vehicle']['image'] : '',
                        'map'          => ($sd['vehicle']['seat_map'] != '') ? Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $sd['vehicle']['seat_map'] : '',
                        'contact_info' => $sd['vehicle']['contact_info'],
                        'model'        => $sd['vehicle']['manufacturer'] . ' - ' . $sd['vehicle']['model'],
                        'type'         => [
                                'name'   => $sd['vehicle']['vehicleType']['name'],
                                'remark' => $sd['vehicle']['vehicleType']['remark'],
                        ],
                        'amenities'    => ($sd['vehicle']['amenities'] != '') ? self::formatAmenities($sd['vehicle']['amenities']) : [],
                        'ratings'      => (isset($sd['vehicle']['vehicleRatings']) && !empty($sd['vehicle']['vehicleRatings'])) ? self::formatRatings($sd['vehicle']['vehicleRatings']) : [],
                        'comments'     => (isset($sd['vehicle']['vehicleComments']) && !empty($sd['vehicle']['vehicleComments'])) ? $sd['vehicle']['vehicleComments'] : []
                ],
                // 'bookings' => (isset($sd['bookings']) && is_array($sd['bookings']) && !empty($sd['bookings'])) ? self::formatBookings($sd['bookings']) : [],
                'route'   => (isset($sd['scheduleRoutes']) && is_array($sd['scheduleRoutes']) && !empty($sd['scheduleRoutes']) && $sd['prices'] != '') ? self::formatRoute($sd['scheduleRoutes']) : [],
                'prices'  => ($sd['prices'] != '') ? self::formatPrices($sd['prices']) : []
        ];
    }

    public
    static function formatPrices($prices) {
        $prices = Misc::json_decode($prices);
        //   $prices = array_reverse($prices, true);
        //     print_r($prices);
        $formatted = [];
        if (is_array($prices) && count($prices)) {
            foreach ($prices as $rk => $r) {
                $cc = 0;
                // $formatted[$c['from_id']]['data'] = $r;
                foreach ($r as $ck => $c) {
                    if ($cc == 0) {
                        $formatted[$rk]['data'] = [
                                'location'    => ucwords($c['from']),
                                'address'     => ucwords($c['from_address']),
                                'location_id' => $c['from_id'],
                        ];
                    }
                    $cc++;
                    $formatted[$rk]['to'][$ck] = [
                            'location'    => ucwords($c['to']),
                            'address'     => ucwords($c['to_address']),
                            'location_id' => $ck,
                            'price'       => $c['price']
                    ];


                }
            }
        }

        return $formatted;
    }

    public
    static function getSchedules($parameters) {
        $onward = $return = [];
        if (isset($parameters['departure']) && $parameters['departure'] != '') {
            $parameters['departure'] = Misc::date_YmdHis($parameters['departure']);
        }
        if (isset($parameters['return']) && $parameters['return'] != '') {
            $parameters['return'] = Misc::date_YmdHis($parameters['return']);
        }
        $q = Schedules::find()
                      ->with('scheduleRoutes')
                      ->with('user')
                //    ->with('bookings')
                      ->with('vehicle')
                      ->orderBy([
                                        'departure' => SORT_ASC,
                                ]);
        $r = [];
        $o = $q
                ->where(['=', 'location_from', strtolower($parameters['from'])])
                ->andWhere(['=', 'location_to', strtolower($parameters['to'])])
                ->andWhere(['>', 'is_active', 0]);

        if (isset($parameters['departure']) && $parameters['departure'] != '') {
            $o = $o->andWhere(['like', 'departure', Misc::Ymd($parameters['departure'])]);
        }
        else {
            $o = $o->andWhere(['>=', 'departure', date('Y-m-d H:i:s')]);
            $o = $o->andWhere(['between', 'departure', date('Y-m-d H:i:s'), Misc::add_days(Yii::$app->params['settings']['search_departure_days'], date('Y-m-d H:i:s'))]);
        }
        $o = $o->andWhere('prices != "" OR prices IS NOT NULL')
               ->asArray()
               ->all();
     //   return $o->createCommand()->getRawSql();
        if (true === false && isset($parameters['return']) && $parameters['return'] != '') {
            $r = $q
                    ->where(['=', 'location_from', $parameters['to']])
                    ->andWhere(['=', 'location_to', $parameters['from']])
                    ->andWhere(['like', 'departure', Misc::Ymd($parameters['return'])])
                    ->asArray()
                    ->all();
        }


        if (!empty ($o)) {
            $onward = self::formatSchedules($o);
            //   $onward = $o;
        }
        if (!empty ($r)) {
            $return = self::formatSchedules($r);
        }

        return [
                'onward' => $onward,
                'return' => $return
        ];
    }

    public
    static function getSchedule($id) {
        if ($id > 0) {
            $s = Schedules::find()
                          ->where(['=', 'id', $id])
                          ->with('scheduleRoutes')
                          ->with('user')
                    // ->with('bookings')
                          ->with('vehicle')
                          ->one();
            if (!empty($s)) {
                return self::formatSchedule($s);
            }
        }
        return false;
    }

    public
    static function toggleSeat($seat) {
        $sid = Misc::decrypt($seat['sid']);
        if ($sid > 0) {
            $model = Schedules::find()
                              ->where(['=', 'id', $sid])
                              ->one();
            $seats = ($model && $model['seats'] != '') ? Misc::json_decode($model['seats']) : [];
            if (!empty($seats) && isset($seats[$seat['id']])) {
                if ($seat['selected'] == 1) {
                    $seats[$seat['id']]['booking'] = [
                            "type" => "temporary",
                            "time" => date('Y-m-d H:i:s'),
                    ];
                }
                else {
                    if (isset($seats[$seat['id']]['booking'])) {
                        unset($seats[$seat['id']]['booking']);
                    }
                }

                $model->seats = Misc::json_encode($seats);

                if ($model->save() !== false) {
                    return true;
                }
            }
        }
        return false;
    }
}