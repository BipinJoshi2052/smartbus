<?php


/**
 * @author Chetan Rajbhandari
 */

namespace common\components;

use common\components\HelperUpload as Upload;
use common\models\Amenities;
use common\models\Blog;
use common\models\Clients;
use common\models\generated\UserRoles;
use common\models\Locations;
use common\models\Messages;
use common\models\Pages;
use common\models\Permissions;
use common\models\ScheduleRoutes;
use common\models\Schedules;
use common\models\Settings;
use common\models\User;
use common\models\UserDetails;
use common\models\Vehicles;
use common\models\VerificationActions;
use Faker\Provider\DateTime;
use Yii;
use Yii\base\Component;
use yii\helpers\ArrayHelper;

class Helper extends Component {
    public function init() {
        self::getPages();
        self::getSettings();
        self::getCount();
        self::getMessages();
        self::getRoles();
        self::setParamPermissions();
        HelperCareers::getCount();
        parent::init();
    }

    public static function detectFrontendBackend() {
        $a = (Yii::getAlias('@app'));
        $a = explode('\\', $a);
        $a = end($a);

        return $a;
    }

    public static function setParamPermissions() {
        $p = HelperPermissions::getPermissions();
        if (Yii::$app->user->isGuest) {
            return false;
        }
        Yii::$app->params['permissions'] = $p[Yii::$app->user->identity->role];
        Yii::$app->params['running-interface'] = self::detectFrontendBackend();
        return true;
    }

    public static function getPages() {
        $p = Pages::find()
                  ->all();
        $q = [];
        foreach ($p as $a) {
            $q[$a['name']] = $a;
        }
        Yii::$app->params['pages'] = $q;
    }

    public static function getRoles() {
        $roles = UserRoles::find()
                          ->where(['=', 'is_active', '1'])
                          ->all();
        foreach ($roles as $k => $role) {
            Yii::$app->params['role_num'] [$role->role] = $role->id;
            Yii::$app->params['role_assoc'][$role->id] = $role->role;
        }


    }

    public static function getMessages() {
        $s = Messages::find()
                     ->where('is_new = 1')
                     ->orderBy(['id' => SORT_DESC])
                     ->asArray()
                     ->limit('4')
                     ->all();

        Yii::$app->params['messages'] = $s;
    }

    public static function getCount() {
        $count = HelperMessages::getCount();
        Yii::$app->params['count_messages'] = $count;
    }

    public static function getSettings() {
        $s = Settings::find()
                     ->all();
        $m = [];
        foreach ($s as $k => $v) {
            $m[$v['slug']] = $v->content;
        }
        Yii::$app->params['settings'] = $m;
    }

    public static function getMenu($role) {
        $u = [];
        $p = Permissions::find()
                        ->where('role = ' . $role)
                        ->all();
        foreach ($p as $k => $h) {
            if ($h->c || $h->r || $h->u || $h->d) {
                if (!isset($u[strtolower($h->controller)])) $u[strtolower($h->controller)] = [];
                ($h->c) ? array_push($u[strtolower($h->controller)], 'create') : null;
                ($h->r) ? array_push($u[strtolower($h->controller)], 'read') : null;
                ($h->u) ? array_push($u[strtolower($h->controller)], 'update') : null;
                ($h->d) ? array_push($u[strtolower($h->controller)], 'delete') : null;
            }
        }
        return $u;
    }

    public static function setDashboard($data) {
        $user = User::find()->where('id='.$data['id'])->one();

        $user_detail = UserDetails::find()->where('user_id='.$data['id'])->one();
        if(isset($user_detail) && !empty($user_detail)) {
            $user_detail->company = $data['company'];
            $user_detail->address = $data['address'];
            $user_detail->phone = $data['phone'];
            $user_detail->citizenship = $data['citizenship'];
            $user_detail->license_no = $data['license_no'];
            $user_detail->contact_person_name = $data['contact_person_name'];
            $user_detail->contact_person_phone = $data['contact_person_phone'];
            $user_detail->contact_person_email = $data['contact_person_email'];
        }
        else{
            $user_detail = new UserDetails();
            $user_detail->company = $data['company'];
            $user_detail->address = $data['address'];
            $user_detail->phone = $data['phone'];
            $user_detail->citizenship = $data['citizenship'];
            $user_detail->license_no = $data['license_no'];
            $user_detail->contact_person_name = $data['contact_person_name'];
            $user_detail->contact_person_phone = $data['contact_person_phone'];
            $user_detail->contact_person_email = $data['contact_person_email'];
        }

        if($user_detail->save()) {
            $user->name = $data['name'];
            $user->email = $data['email'];

            if($user->save()) {
                return true;
            }else{
                return false;
            }
        }
        return false;
    }
    public static function requestVerification($table, $id = 0) {
        $m = 'common\models\\' . Yii::$app->params['tables'][$table]['moderation'];
        $model = ($id > 0) ? $m::findOne($id) : new  $m();

        $model->table_name = $table;
        $model->comment = Yii::$app->params['tables'][$table]['name'];
        if (Yii::$app->params['role_assoc'][Yii::$app->user->identity->role] == 'admin') {
            $model->verification_status = 1;
            $model->verified_by = Yii::$app->user->identity->id;
            $model->verified_on = Misc::getTime();
        }
        else {
            $model->verification_status = 0;
        }

        $model->requested_by = Yii::$app->user->identity->id;

        if ($model->validate() && $model->save() != false) {
            return $model;
        }
        Misc::setFlash('danger', 'Could not set verification. Please Try again');

        return false;
    }

    public static function requestModel($table, $id) {

        $mod = 'common\models\\' . Yii::$app->params['tables'][$table]['model'];

        if ($id > 0) {
            $model = $mod::findOne($id);
            if ($model->hasAttribute('updated_on')) {
                $model->updated_on = Misc::getTime();
            }
            if ($model->hasAttribute('updated_by')) {
                $model->updated_by = Yii::$app->user->identity->id;
            }
        }
        else {
            $model = new $mod ();
            if ($model->hasAttribute('created_on')) {
                $model->created_on = Misc::getTime();
            }
            if ($model->hasAttribute('created_by')) {
                $model->created_by = Yii::$app->user->identity->id;
            }
        }
        if ($model->hasAttribute('verification_id')) {
            $vid = ($model->verification_id != '' && intval($model->verification_id) > 0) ? $model->verification_id : 0;
            $verification = self::requestVerification($table, $vid);
            if ($verification->id > 0) {
                $model->verification_id = $verification->id;
                $model->is_verified = $verification->verification_status;
            }
            else {
                Misc::setFlash('danger', 'Could not set verification. Please Try again');
                return false;
            }
        }
        return $model;
    }


    public static function processSchedule($schedule) {
        $sch = $schedule;
        $totalBooked = 0;
        if (isset($schedule['bookings'])) {
            unset($sch['bookings']);
            foreach ($schedule['bookings'] as $l => $b) {
                $bs = Misc::json_decode($b['seats']);
                $c = count($bs);
                $sch['bookings'][$b['id']]['data'] = $b;
                $sch['bookings'][$b['id']]['data']['seats'] = $bs;
                $sch['bookings'][$b['id']]['count'] = $c;
                $sch['bookings'][$b['id']]['seats'] = implode(',', ArrayHelper::getColumn($bs, 'name'));
                $totalBooked += $c;
            }
        }
        $sch['total_bookings'] = $totalBooked;

        return $sch;
    }

    public static function processSchedules($schedules) {
        $sk = [];
        if (!empty($schedules)) {
            foreach ($schedules as $k => $schedule) {
                array_push($sk, self::processSchedule($schedule));
            }
        }
        return $sk;
    }

    public static function getSchedule($id) {
        $model = Schedules::find()
                          ->where(['id' => $id])
                          ->with('bookings')
                          ->with('scheduleRoutes')
                          ->with('user')
                          ->with('vehicle')
                          ->with('createdBy')
                          ->with('updatedBy');


        if (!(Yii::$app->user->identity->role == Yii::$app->params['role_num']['admin'] || Yii::$app->user->identity->role == Yii::$app->params['role_num']['admin'])) {
            $model = $model->andWhere('user_id = ' . Yii::$app->user->identity->id);
        }
        $model = $model->asArray()
                       ->one();
        return self::processSchedule($model);

    }

    public static function getSchedules($departure = null, $show_old = false, $user_id = null) {
        $model = Schedules::find()
                          ->with('bookings')
                          ->with('vehicle')
                          ->with('scheduleRoutes')
                          ->with('user')
                          ->with('createdBy')
                          ->with('updatedBy');

        if ($departure != null) {
            $model = $model->where(['departure' => $departure]);
        }
        elseif ($show_old == false) {
            $model = $model->where(['>', 'departure', date('Y-m-d H:i:s')]);
        }
        else {
            $model = $model->where('departure  BETWEEN CAST("' . date('Y-m-d H:i:s') . '" AS DATE) AND CAST("' . Misc::add_datetime(Yii::$app->params['settings']['search_departure_days']) . '" AS DATE)');
        }

        if (!(Yii::$app->user->identity->role == Yii::$app->params['role_num']['admin'] || Yii::$app->user->identity->role == Yii::$app->params['role_num']['admin'])) {
            if ($user_id === null) {
                $user_id = Yii::$app->user->identity->id;
            }
        }

        if ($user_id != null) {
            $model = $model->andWhere('user_id = ' . $user_id);
        }

        $model = $model->asArray()
                       ->all();

        return self::processSchedules($model);

    }


    public static function setFeaturedImage($model, $image) {
        if ($model->image != '') {
            if (Misc::delete_file($model->image, 'image')) {
                $model->image = '';
            }
        }
        $upload = HelperUpload::upload($image);
        if ($upload != false) {
            $model->image = $upload;
        }
        else {
            Misc::setFlash('danger', 'Image not uploaded. Please Try again');
        }
        return $model;
    }

    public static function setAmenity($table, $data) {
        if ($data['id'] == 0) {
            $model = new VerificationActions();
            $model->table_name = $table;
            $model->comment = ucwords($table);
            $model->requested_by = Yii::$app->user->identity->id;
            if ($model->save()) {
                $model2 = new Amenities();
                $model2->name = $data['name'];
                $model2->display_name = ucwords($data['name']);
                $model2->icon = $data['icon'];
                $model2->verification_id = $model->id;
                $model2->created_by = Yii::$app->user->identity->id;
                if ($model2->save()) {
                    $model->table_id = $model2->id;
                    if ($model->save()) {
                        return $var = [
                                'verification_status' => 0,
                                'response'            => true
                        ];
                    }
                }
            }
            else {
                return $var = [
                        'verification_status' => 0,
                        'response'            => false
                ];
            }
        }
        else {
            $model = Amenities::findOne($data['id']);
            $model->name = $data['name'];
            $model->display_name = ucwords($data['name']);
            $model->icon = $data['icon'];
            $model->updated_by = Yii::$app->user->identity->id;
            $model->updated_on = date('Y-m-d H:i:s');
            if ($model->save()) {
                return $var = [
                        'verification_status' => $model->is_verified,
                        'response'            => true
                ];
            }
            else {
                return $var = [
                        'verification_status' => 0,
                        'response'            => false
                ];
            }

        }
    }

    public static function setClient($post, $image) {
        if (empty($post['id'])) {
            $model = new Clients();
            $model->attributes = $post;
            if ($model->save()) {
                $id = $model->id;
                if (isset($image['name']) && strlen(trim($image['name'])) > 0) {
                    $file = $image;
                    if ($id > 0) {
                        $model = Clients::findOne($id);
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
            $id = Misc::decrypt($post['id']);
            $model = Clients::findOne($id);

            //category
            $model->attributes = $post;
            //updated_on
            $model->updated_on = date('Y-m-d H:i:s');
            //updated_by
            $model->updated_by = Yii::$app->user->identity->id;

            if ($model->save()) {
                if (isset($image['name']) && strlen(trim($image['name'])) > 0) {
                    $file = $image;
                    if ($id > 0) {
                        $model = Clients::findOne($id);
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


    public static function setModel($table, $data, $image = [], $seats = []) {

        if ($data['id'] != '') {

            $model = self::requestModel($table, $data['id']);

            if ($model && !empty($model)) {
                $model->attributes = $data;
                //            $model->load($data);
                if ($model->hasAttribute('image') && isset($image['name']) && $image['name'] != '') {
                    $model = self::setFeaturedImage($model, $image);
                }

                if ($table == 'vehicles') {
                    if ($data['registration_date'] != '') {
                        $data['registration_date'] = Misc::Ymd($data['registration_date']);
                        $model->registration_date = ($data['registration_date'] != '') ? Misc::Ymd($data['registration_date']) : '';
                    }

                    if (!empty($seats)) {
                        $model = self::setSeats($model, $seats);
                    }
                    if (!empty($data['amenities'])) {
                        $model->amenities = Misc::json_encode($data['amenities']);
                    }
                }

                if ($table == 'schedules') {
                    $vehicle = Vehicles::findOne($data['vehicle_id']);
                    $model->departure = Misc::Ymd($data['departure']);
                    $model->arrival = Misc::Ymd($data['arrival']);
                    $model->user_id = $vehicle->user_id;
                    $model->seats = $vehicle->seats;
                    $model->location_from = $data['location_from'];
                    $model->location_to = $data['location_to'];
                    $model->prices = (isset($data['prices']) && !empty($data['prices'])) ? Misc::json_encode($data['prices']) : '';

                    $model->duration = (isset($data['duration']) && $data['duration'] != '') ? $data['duration'] : '';
                }
                if (!$model->validate()) {
                    Misc::setFlash('danger', json_encode($model->getErrors()));
                    return false;
                }

                if (!($model->save() == false)) {
                    return $var = [
                            'id' => $model['id']
                    ];
                }
            }
            Misc::setFlash('danger', ucwords(str_replace(['_'], ' ', $table)) . ' not updated. Please Try again');

            return false;
        }
        else {
            $id = '';
            $model = self::requestModel($table, $id);
            if ($model && !empty($model)) {
                $model->attributes = $data;
                //            $model->load($data);
                if ($model->hasAttribute('image') && isset($image['name']) && $image['name'] != '') {
                    $model = self::setFeaturedImage($model, $image);
                }

                if ($table == 'vehicles') {
                    if ($data['registration_date'] != '') {
                        $data['registration_date'] = Misc::Ymd($data['registration_date']);
                        $model->registration_date = ($data['registration_date'] != '') ? Misc::Ymd($data['registration_date']) : '';
                    }

                    if (!empty($seats)) {
                        $model = self::setSeats($model, $seats);
                    }
                    if (!empty($data['amenities'])) {
                        $model->amenities = Misc::json_encode($data['amenities']);
                    }
                }

                if ($table == 'schedules') {
                    $vehicle = Vehicles::findOne($data['vehicle_id']);
                    $model->departure = Misc::Ymd($data['departure']);
                    $model->arrival = Misc::Ymd($data['arrival']);
                    $model->user_id = $vehicle->user_id;
                    $model->seats = $vehicle->seats;
                    $model->location_from = $data['location_from'];
                    $model->location_to = $data['location_to'];
                    $model->prices = (isset($data['prices']) && !empty($data['prices'])) ? Misc::json_encode($data['prices']) : '';

                    $model->duration = (isset($data['duration']) && $data['duration'] != '') ? $data['duration'] : '';
                }

                if (!$model->validate()) {
                    Misc::setFlash('danger', json_encode($model->getErrors()));
                    return false;
                }

                if (!($model->save() == false)) {
                    $table_id = $model->verification_id;
                    $model2 = VerificationActions::find()->where('id=' . $table_id)->one();
                    $model2->table_id = $model->id;
                    $requested_user_id = $model2->requested_by;
                    $requested_user = User::find()->where('id=' . $requested_user_id)->one();
                    if ($requested_user['role'] == 1) {
                        $model2->edited_status = 1;
                    }
                    if (!$model2->save()) {
                        return false;
                    }

                    return $model;
                }
            }
            Misc::setFlash('danger', ucwords(str_replace(['_'], ' ', $table)) . ' not updated. Please Try again');

            return false;
        }
    }

    public static function setRoute($schedule, $route) {
        $a = $route[0];
        $d = $route[count($route) - 1];
        if (!empty($a)) {
            $schedule->arrival = Misc::date_YmdHis($schedule->arrival . ' ' . $a['time']);
            //  $schedule->location_from = $a['location'];
        }
        if (!empty($d)) {
            //   $schedule->location_to = $d['location'];
            $schedule->departure = Misc::date_YmdHis($schedule->departure . ' ' . $d['time']);
        }
        if (!empty($a) && !empty($d)) {
            $schedule->duration = Misc::timeDifferenceHr($schedule->arrival, $schedule->departure);
        }

        if (!($schedule->validate() && $schedule->save())) {
            Misc::setFlash('danger', 'Schedule not updated ||| ' . json_encode($schedule->getErrors()));
        }

        $rcount = 1;
        foreach ($route as $location) {
            if (isset($location['id'])) {
                $id = Misc::decrypt($location['id']);
                $point = ScheduleRoutes::findOne($id);
            }
            else {
                $point = new ScheduleRoutes();
            }
            $point->schedule_id = $schedule->id;
            $point->order_index = $rcount;

            $point->location_id = $location['location'];
            $point->description = $location['description'];
            $point->time = $location['time'];

            $point->is_boarding = (isset($location['boarding']) && $location['boarding'] == 'on') ? 1 : 0;
            $point->is_dropping = (isset($location['dropping']) && $location['dropping'] == 'on') ? 1 : 0;
            $rcount++;
            if (!($point->validate() && $point->save())) {
                Misc::setFlash('danger', 'Route Point Not Stored ||| ' . json_encode($point->getErrors()));
            }
        }

        return $schedule;

    }

    public static function setSeats($model, $seats) {
        $count = 0;
        $a = [];
        $cr = 0;
        foreach ($seats as $row) {
            $cs = 0;
            foreach ($row as $col) {
                if ($col != '') {
                    $a[$cr][$cs]['id'] = $count;
                    $a[$cr][$cs]['name'] = $col;
                    $a[$cr][$cs]['status'] = '';
                    $count++;
                }
                else {
                    $a[$cr][$cs] = [];
                }
                $cs++;
            }
            $cr++;
        }

        $model->seat_count = $count;
        $model->seats = Misc::json_encode($a);
        return $model;
    }

    public static function getAll($model, $conditions = [], $active = true, $order = '') {
        $m = $model;
        $model = (Yii::$app->params['modelpath'] . ucwords($model));
        $rules = $model::attributeLabels();
        $data = $model::find();

        if (key_exists('verification_id', $rules)) {
            $data = $data->with('verification');
        }
        if (key_exists('created_by', $rules)) {
            $data = $data->with('createdBy');
        }
        if (key_exists('updated_by', $rules)) {
            $data = $data->with('updatedBy');
        }
        if (!empty($conditions)) {
            foreach ($conditions as $k => $c) {
                if ($k === 1) {
                    $data = $data->where($c);
                }
                else {
                    $data = $data->andWhere($c);
                }
            }
        }
        if ($active && key_exists('is_active', $rules)) {
            $data = $data->andWhere(' is_active = 1 ');
        }
        //        if (!empty($order)) {
        //            $data = $data->orderBy($order);
        //        }
        return $data->orderBy(['id' => SORT_DESC])->asArray()->all();
    }

    public static function getAllActive($model) {
        $m = $model;
        $model = (Yii::$app->params['modelpath'] . ucwords($model));
        $rules = $model::attributeLabels();
        $data = $model::find();


        if (key_exists('created_by', $rules)) {
            $data = $data->with('createdBy');
        }
        if (key_exists('updated_by', $rules)) {
            $data = $data->with('updatedBy');
        }
        if (key_exists('verification_id', $rules)) {
            $data = $data->with('verification')
                         ->where(['=', 'is_active', '1'])
                         ->andWhere(['=', 'is_verified', '1']);
        }
        else {
            $data = $data->where(['=', 'is_active', '1']);
        }


        return $data->asArray()
                    ->all();
    }

    public static function getAllActiveWhere($model, $condition = '') {
        return (Yii::$app->params['modelpath'] . $model)::find()
                                                        ->joinWith('verification')
                                                        ->with('createdBy')
                                                        ->with('updatedBy')
                                                        ->where(['=', 'is_active', '1'])
                ->$condition
                ->all();

    }

    public static function getAllWhere($model, $condition) {
        $model = (Yii::$app->params['modelpath'] . $model);
        $rules = $model::attributeLabels();
        $data = $model::find();

        if (key_exists('verification_id', $rules)) {
            $data = $data->with('verification');
        }
        if (key_exists('created_by', $rules)) {
            $data = $data->with('createdBy');
        }
        if (key_exists('updated_by', $rules)) {
            $data = $data->with('updatedBy');
        }


        return $data->all();

    }

    public static function getOne($model, $id) {

        return ($id > 0) ? (Yii::$app->params['modelpath'] . $model)::find()
                                                                    ->with('verification')
                                                                    ->with('createdBy')
                                                                    ->with('updatedBy')
                                                                    ->where(['=', 'id', $id])
                                                                    ->asArray()
                                                                    ->one() : false;
    }

    public static function getOneWhere($model, $id, $condition) {
        $id = Misc::decrypt($id);
        return ($id > 0) ? (Yii::$app->params['modelpath'] . $model)::find($id)
                                                                    ->with('verification')
                                                                    ->with('createdBy')
                                                                    ->with('updatedBy')
                                                                    ->one() : false;
    }


    public static function getVendors() {
        $vendors = User::find()
                       ->with('userDetails')
                       ->where(['=', 'status', User::STATUS_ACTIVE])
                       ->andWhere(['=', 'is_verified', '1']);
        $permission = (isset(Yii::$app->params['permissions']['Users']) && in_array('read', Yii::$app->params['permissions']['Users']));

        if (Yii::$app->user->identity->role == Yii::$app->params['role_num']['vendor']) {
            $vendors = $vendors->andWhere(['=', 'id', Yii::$app->user->identity->getId()]);
        }
        elseif ($permission) {
            $vendors = $vendors->andWhere(['=', 'role', Yii::$app->params['role_num']['vendor']]);
        }
        //        echo $vendors->createCommand()->sql;
        $vendors = $vendors->all();

        return $vendors;
    }

    public static function getVehicles() {
        $vehicles = Vehicles::find()
                            ->with('type0')
                            ->where(['=', 'is_verified', '1']);
        $permission = (isset(Yii::$app->params['permissions']['Vehicles']) && in_array('read', Yii::$app->params['permissions']['Vehicles']));

        if (Yii::$app->user->identity->role == Yii::$app->params['role_num']['vendor']) {
            $vehicles = $vehicles->andWhere(['=', 'user_id', Yii::$app->user->identity->getId()]);
            $vehicles = $vehicles->all();
        }
        elseif ($permission) {
            $vehicles = $vehicles->all();
        }
        else {
            $vehicles = [];
        }


        return $vehicles;
    }

    public static function checkAuthority($controller, $action = '') {
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->role == Yii::$app->params['role_num']['admin']) {
                return true;
            }
            $permissions = Yii::$app->params['permissions'];
            $interface = Yii::$app->params['running-interface'];
            $controller = ucwords($controller) . 'Controller';
            $action = strtolower($action);
            if (isset($permissions[$interface][$controller][$action]['status']) && $permissions[$interface][$controller][$action]['status'] == 1) {
                return true;
            }
        }

        return Misc::throwException(403);
    }

    public static function setUser($data, $image = []) {
        $id = Misc::decrypt($data['user']['id']);
        if ($id > 0) {
            $user = User::findOne($id);
            $new = false;
            $user->username = $user->email;
            $user->name = (isset($data['userdetails']['company']) && $data['userdetails']['company'] != '') ? $data['userdetails']['company'] : $data['userdetails']['contact_person_name'];
            $user->updated_on = Misc::getTime();
            $user->updated_by = Yii::$app->user->identity->id;
        }
        else {
            $user = new User();
            $user->generateAuthKey();
            $user->generatePasswordResetToken();
            $user->incorrect_login = 0;
            $user->status = User::STATUS_ACTIVE;
            $new = true;

            $user->username = $data['user']['email'];
            $user->name = (isset($data['userdetails']['company']) && $data['userdetails']['company'] != '') ? $data['userdetails']['company'] : $data['userdetails']['contact_person_name'];

            $user->created_on = Misc::getTime();
            $user->created_by = Yii::$app->user->identity->id;
        }

        $vid = ($user->verification_id != '' && intval($user->verification_id) > 0) ? $user->verification_id : 0;

        $verification = self::requestVerification('user', $vid);


        if ($verification) {
            $user->is_verified = $verification->verification_status;
            $user->verification_id = $verification->id;


            $userDetails = (isset($data['userdetails']['id']) > 0 && $data['userdetails']['id'] > 0) ? UserDetails::findOne(['=', 'user_id', $data['userdetails']['id']]) : new UserDetails();
            if (empty($userDetails)) {
                $userDetails = new UserDetails();
            }
            $user->attributes = $data['user'];
            $userDetails->attributes = $data['userdetails'];
            $user->role = Yii::$app->params['role_num'][$data['user']['role']];
            if ($new && isset($data['user']['password']) && $data['user']['password'] != '') {
                $user = self::changePassword($user, $data['user']['password']);
            }

            $err = [
                    'user'         => [],
                    'user-details' => []
            ];
            if (!empty($image) && isset($image['name']) && $image['name'] != '') {
                $user = self::setFeaturedImage($user, $image);
            }
            if (isset($data['userdetails']['allowed_gateways']) && !empty($data['userdetails']['allowed_gateways']))
                $userDetails->allowed_gateways = json_encode($data['userdetails']['allowed_gateways']);

            if ($user->validate()) {
                if (!($user->save() == false)) {
                    $userDetails->user_id = $user->id;
                    //                    $userDetails->is_vat = (isset($data['userdetails']['is_vat']))?intval($data['userdetails']['is_vat']):0;
                    if (!($userDetails->save() == false)) {
                        return $user;
                    }
                    else {
                        $err  ['user-details'] = $userDetails->getErrors();
                    }
                }
            }
        }

        $err  ['user'] = $user->getErrors();
        Misc::setFlash('danger', json_encode($err));
        return false;

    }

    public static function changePassword($user, $password, $oldPassword = '') {

        if ($oldPassword != '') {
            if ($user->validatePassword($oldPassword)) {
                $user->setPassword($password);
            }
        }
        else {
            $user->setPassword($password);
        }
        return $user;
    }

    public static function setAjaxData($data) {
        //        echo json_encode($data);die;
        //        $m = Yii::$app->params['modelpath'] . ucwords($data['target']);
        $id = Misc::decrypt($data['row']);
        $a = ($id > 0) ? ('common\models\\' . ucwords($data['target']))::find()
                                                                       ->where('id = ' . $id)
                                                                       ->one() : false;

        echo json_encode($a);
        die;
        if (!empty($model)) {
            $model->$data['col'] = $data['value'];
            if ($model->save() != false) {
                return true;
            }
        }

        return false;
    }
}