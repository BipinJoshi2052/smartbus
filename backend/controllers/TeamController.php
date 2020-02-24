<?php

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperTeam;
use common\components\Misc;
use common\models\Team;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


class TeamController extends Controller {
    public $permissions;

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
                'access' => [
                        'class' => AccessControl::className(),
                        'rules' => [
                                [
                                        'actions' => ['login', 'error'],
                                        'allow'   => true,
                                ],
                                [
                                    //                            'actions' => ['logout', 'index'],
                                    'allow' => true,
                                    'roles' => ['@'],
                                ],
                        ],
                ],
                'verbs'  => [
                        'class'   => VerbFilter::className(),
                        'actions' => [
                            //                    'logout' => ['post'],
                        ],
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
        $this->permissions = Helper::checkAuthority(Yii::$app->controller->id, Yii::$app->controller->action->id);
        return parent::beforeAction($action);
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
     * Displays homepage.
     * @return string
     */
    public function actionIndex($id = '') {
        $id = Misc::decrypt($id);

        $team = Team::find()
                    ->all();
        $editable = false;
        // echo '<pre>';
        // print_r($team);die;
        foreach ($team as $k => $member) {

            if ($member['social_media'] != '') {
                $team[$k]['social_media'] = json_decode($member['social_media']);
            }

            if ($member['id'] == $id) {
                $editable = $team[$k];
            }
        }

        return $this->render('index', [
                'team'     => $team,
                'editable' => $editable,
        ]);
    }

    public function actionUpdate() {
        $image = (isset($_FILES['image'])) ? $_FILES['image'] : [];
        if (isset($_POST['team'])) {
            $updated = HelperTeam::set($_POST['team'], $image);
            if ($updated != false) {
                Misc::setFlash('success', 'Member Updated.');
                //return $this->redirect(Yii::$app->request->baseUrl . '/team/edit/' . Misc::encrypt($updated['id']));
            }
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/team/');
    }
}
