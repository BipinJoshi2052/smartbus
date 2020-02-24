<?php


/**
 * @author Chetan Rajbhandari
 */

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperRoutes;
use common\components\HelperVehicles;
use common\components\Misc;
use common\components\UploadHandler;
use common\models\Locations;
use common\models\Schedules;
use common\models\User;
use common\models\Vehicles;
use common\models\VehicleTypes;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\Response;

class VehiclesController extends Controller {
    public $permissions;

    /**
     * {@inheritdoc}
     */
    public function behaviors() {

    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
                'error' => [
                        'class'  => 'yii\web\ErrorAction',
                        'layout' => 'error',
                ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeAction($action) {
        if ($action->id == 'error') {
            $this->layout = 'error';
        }
        elseif ($action->id == 'upload-seat-map') {
            $this->enableCsrfValidation = false;
        }
        $this->permissions = Helper::checkAuthority(Yii::$app->controller->id, Yii::$app->controller->action->id);
        return parent::beforeAction($action);
    }

    public function actionIndex() {
        $vehicles = Helper::getVehicles();
        return $this->render('index', [
                'all' => $vehicles,
        ]);
    }

    public function actionCreate() {

        return $this->render('form', [
                'vendors'       => Helper::getVendors(),
                'types'         => Helper::getAllActive('VehicleTypes'),
                'amenities'     => Helper::getAllActive('Amenities'),
                'editable'      => [],
                'new'           => true,
                'is_authorized' => in_array(Yii::$app->params['role_assoc'][Yii::$app->user->identity->role], Misc::json_decode(Yii::$app->params['settings']['can_verify_vendors']))
        ]);
    }

    public function actionEdit($id = '') {
        if ($id != '') {
            $id = Misc::decrypt($id);
        }
        $vendors = Helper::getVendors();

        return $this->render('form', [
                'vendors'       => $vendors,
                'types'         => Helper::getAllActive('VehicleTypes'),
                'amenities'     => Helper::getAllActive('Amenities'),
                'editable'      => ($id != '' && $id > 0) ? Vehicles::findOne($id) : [],
                'new'           => false,
                'is_authorized' => in_array(Yii::$app->params['role_assoc'][Yii::$app->user->identity->role], Misc::json_decode(Yii::$app->params['settings']['can_verify_vendors']))

        ]);
    }

    public function actionUpdate() {
        $vehicle = (isset($_POST['vehicle'])) ? $_POST['vehicle'] : [];
        $image = (isset($_FILES['image'])) ? $_FILES['image'] : [];
        $seats = (isset($_POST['seats']) && !empty($_POST['seats'])) ? $_POST['seats'] : [];
        if (isset($_POST['vehicle'])) {
            $updated = Helper::setModel('vehicles', $vehicle, $image, $seats);
            if ($updated != false) {
                Misc::setFlash('success', 'Vehicle Updated.');
                return $this->redirect(Yii::$app->request->baseUrl . '/vehicles/edit/' . Misc::encrypt($updated['id']));
            }
        }

        return $this->redirect(Yii::$app->request->baseUrl . '/vehicles/');
    }

    public function actionUpdateSeats() {

        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post('seats');
            $id = Misc::decrypt($post['vehicle']);
            $seats = $post['layout'];
            if ($id > 0 && !empty($seats)) {
                $model = Vehicles::find()
                                 ->where(['=', 'id', $id])
                                 ->one();

                if ($model) {
                    //     print_r($model);
                    $model->seat_count = count($seats);
                    $model->seats = Misc::json_encode($seats);
                    //     $model->seats = Misc::json_encode($seats);

                    if ($model->save(false) != false) {
                        return Misc::json_encode(true);
                    }
                    else {
                        return $model->getErrors();
                    }
                }
            }
        }
        return Misc::json_encode(false);
    }

    public function actionUploadSeatMap() {
        $uh = new UploadHandler();
        $response = $uh->get_response();
        //   echo json_encode($response);
        $a = Yii::$app->request->post('id');
        $id = Misc::decrypt($a);
        if ($id > 0 && isset($response['files'][0]->name) && $response['files'][0]->name != '') {

            $m = Vehicles::find()
                         ->where(['=', 'id', $id])
                         ->one();
            if (!empty($m)) {
                $m->seat_map = $response['files'][0]->name;
                if ($m->save() != false) {
                    return Misc::json_encode(true);
                }
            }
        }
        return Misc::json_encode(false);
    }

    public function actionDelete() {

    }


    public function actionTypes($id = '') {
        $id = Misc::decrypt($id);
        return $this->render('type', [
                'all'      => Helper::getAll('VehicleTypes'),
                'editable' => ($id > 0) ? Helper::getOne('VehicleTypes', $id) : false,
                //                'is_authorized' => in_array('update', $this->permissions)
        ]);
    }

    public function actionUpdateVehicleType() {
        if (isset($_POST['type'])) {
            $updated = Helper::setModel('vehicle_types', $_POST['type']);
            if ($updated != false) {
                Misc::setFlash('success', 'Vehicle Type Updated.');
            }
        }

        return $this->redirect(Yii::$app->request->baseUrl . '/vehicles/types');

    }
}
