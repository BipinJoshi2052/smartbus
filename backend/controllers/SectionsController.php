<?php

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperSections;
use common\components\Misc;
use common\models\Sections;
use common\models\Settings;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


/**
 * Clients controller
 */
class SectionsController extends Controller {
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
                                    //                            'actions' => ['logout', 'index'], // Enable for access
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
    public function actionPages($page = '') {

        if ($page != '' && !key_exists($page, Yii::$app->params['pages'])) {
            return $this->redirect(Yii::$app->request->baseUrl . '/sections/pages/home');
        }

        $s = Sections::find();
        if ($page != '') {
            $s->where(['like', 'page', $page]);
        }
        $sections = $s->all();
        return $this->render('index', [
                'sections' => $sections,
                'page'     => Yii::$app->params['pages'][$page],
        ]);
    }

    public function actionSection($id = '') {
        $section = [];
        if ($id != '') {
            $id = Misc::decrypt($id);
            $section = Sections::findOne($id);
        }
        return $this->render('form', [
                'section' => $section,
        ]);
    }

    public function actionUpdate() {
        $image = (isset($_FILES['image'])) ? $_FILES['image'] : [];
        if (isset($_POST['content'])) {
            $updated = HelperSections::set($_POST['content'], $image);
            if ($updated != false) {
                return $this->redirect(Yii::$app->request->baseUrl . '/sections/section/' . Misc::encrypt($updated['id']));
            }
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/sections/');
    }

    public function actionUpdatePage() {
        $image = (isset($_FILES['image'])) ? $_FILES['image'] : [];
        if (isset($_POST['page'])) {
            $updated = HelperSections::setPage($_POST['page'], $image);
            if ($updated != false) {
                Misc::setFlash('success', 'Page Updated.');
                return $this->redirect(Yii::$app->request->baseUrl . '/sections/pages/' . $updated['name']);
            }
        }
        return $this->redirect(Yii::$app->request->baseUrl . '/sections/pages/home');
    }

    public function actionUpdateContactInfo() {
        if (isset($_POST['setting'])) {
            $setting = $_POST['setting'];

            $model = Settings::findOne($setting['id']);
            if ($model) {
                $model->content = json_encode($setting['content']);
                if ($model->save() == true) {
                    Misc::setFlash('success', 'Contact details updated.');
                }
                else {
                    Misc::setFlash('error', 'Contact details not updated.');
                }
            }
        }
        else {
            $model = Settings::find()
                             ->where(['=', 'slug', 'address'])
                             ->one();

            $model['content'] = '';
            if ($model->save() == true) {
                Misc::setFlash('success', 'Social media details updated.');
            }
            else {
                Misc::setFlash('error', 'Social media details not updated.');
            }
        }

        return $this->redirect(Yii::$app->request->baseUrl . 'sections/pages/contact');
    }

    public function actionUpdateSocialMedia() {
        if (isset($_POST['team']['social']) && isset($_POST['team']['id']) && $_POST['team']['id'] > 0) {

            $social = json_encode($_POST['team']['social']);

            $model = Settings::findOne($_POST['team']['id']);
            $model->content = $social;
            if ($model->save() == true) {
                Misc::setFlash('success', 'Social media details updated.');
            }
            else {
                Misc::setFlash('error', 'Social media details not updated.');
            }
        }
        else {
            $model = Settings::find()
                             ->where(['=', 'slug', 'social_media'])
                             ->one();

            $model['content'] = '';
            if ($model->save() == true) {
                Misc::setFlash('success', 'Social media details updated.');
            }
            else {
                Misc::setFlash('error', 'Social media details not updated.');
            }
        }
        return $this->redirect(Yii::$app->request->baseUrl . 'sections/pages/contact');
    }

}
