<?php

/**
 * @author Chetan Rajbhandari
 */

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperAPI;
use common\components\HelperSchedules;
use common\components\Misc;
use common\models\Schedules;
use common\models\Vehicles;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class SchedulesController extends Controller {
    public $permissions;

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return ['access' => ['class' => AccessControl::className(), 'rules' => [['actions' => ['login', 'error'], 'allow' => true,], [//                            'actions' => ['logout', 'index'],
                                                                                                                                      'allow' => true, 'roles' => ['@'],],],], 'verbs' => ['class' => VerbFilter::className(), 'actions' => [],],];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return ['error' => ['class' => 'yii\web\ErrorAction', 'layout' => 'error',],];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeAction($action) {
        if ($action->id == 'error') {
            $this->layout = 'error';
        }
        $this->permissions = Helper::checkAuthority(Yii::$app->controller->id, Yii::$app->controller->action->id);
        return parent::beforeAction($action);
    }

    public function actionIndex() {
        $schedules = [];
        if (Yii::$app->user->identity->role == Yii::$app->params['role_num']['vendor']) {
            $schedules = Helper::getAll('Schedules', [['=', 'user_id', Yii::$app->user->identity->id], ['>=', 'departure', date('Y-m-d H:i:s')]]);
        }
        else {
            $schedules = Helper::getAll('Schedules', [['>=', 'departure', date('Y-m-d H:i:s')]], true, 'departure ASC');
        }
        return $this->render('index', [
                'all' => $schedules,
        ]);
    }

    public function actionView($id) {
        $id = Misc::decrypt($id);
        if ($id > 0) {
            $schedule = Helper::getSchedule($id);
            return $this->render('view', [
                    'schedule' => $schedule,
                    'prices'   => $schedule['prices']]);
        }

        return $this->redirect(Yii::$app->request->baseUrl . '/schedules');
    }

    public function actionCreate() {
        $vehicles = Helper::getVehicles();
        return $this->render('form', [
                'vehicles' => $vehicles,
                'editable' => [],
                'new'      => true,
                'prices'   => []
        ]);
    }

    public function actionEdit($id) {
        $id = Misc::decrypt($id);
        if ($id > 0) {
            $schedule = Helper::getSchedule($id);
            $vehicles = Helper::getVehicles();

            if (!empty($schedule)) {
                return $this->render('form', [
                        'vehicles' => $vehicles,
                        'new'      => false,
                        'editable' => $schedule,
                        'prices'   => (isset($schedule['prices']) != '') ? Misc::formatSchedulePrice($schedule['prices']) : [],
                        'route'    => Misc::formatScheduleRoute($schedule),

                ]);
            }
        }
        Misc::setFlash('danger', 'No such schedule found.');
        return $this->redirect(Yii::$app->request->baseUrl . '/schedules/create');
    }

    public function actionUpdate() {
        $data = (isset($_POST['schedule'])) ? $_POST['schedule'] : [];
        if (!empty($data)) {
            $schedule = Helper::setModel('schedules', $data);
            if ($schedule != false) {
                if (isset($data['route']) && !empty($data['route'])) {
                    $schedule = Helper::setRoute($schedule, $data['route']);
                }
                //                print_r($data['prices']);die;
                //                if (isset($data['prices']) && !empty($data['prices'])) {
                //
                //                    $schedule->prices = Misc::json_encode($data['prices']);
                //                    // Helper::setPrice($schedule->id, $data['prices']);
                //                }

                Misc::setFlash('success', 'Schedule Updated.');
                // return $this->redirect(Yii::$app->request->baseUrl . '/schedules/view/' . Misc::encrypt($schedule->id));
                return $this->redirect(Yii::$app->request->baseUrl . '/schedules/edit/' . Misc::encrypt($schedule->id));
            }
        }

        return $this->redirect(Yii::$app->request->baseUrl . '/schedules');
    }

    public function actionDelete() {
        return;
    }

}

