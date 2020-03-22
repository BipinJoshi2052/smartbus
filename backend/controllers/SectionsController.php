<?php

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperSections;
use common\components\Misc;
use common\models\Pages;
use common\models\Sections;
use common\models\Settings;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use function Sodium\add;


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
        $sections = Sections::find()->with('page')->asArray()->all();

        return $this->render('index', [
                'sections' => $sections,
                'page'     => Yii::$app->params['pages'][$page],
        ]);
    }

    public function actionSection($id = '') {
        $section = [];
        $pages = Pages::find()->all();
        if ($id != '') {
            $id = Misc::decrypt($id);
            $section = Sections::findOne($id);
        }
        return $this->render('form', [
                'section' => $section,
                'pages' =>$pages
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
        if (isset($_POST['page']) && $_POST['on_menu']) {
            $updated = HelperSections::setPage($_POST, $image);
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
            $social = json_encodejson_encode($_POST['team']['social']);

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

            $model['content'] = json_encode($_POST['team']['social']);

            if ($model->save() == true) {
                Misc::setFlash('success', 'Social media details updated.');
            }
            else {
                Misc::setFlash('error', 'Social media details not updated.');
            }
        }
        return $this->redirect(Yii::$app->request->baseUrl . 'sections/pages/contact');
    }
    public function actionDelete()
    {

        if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
            return HelperSections::deleteSections($_POST['id']);
        }
    }
public function actionRemove()
{
    $m= Settings::find()->where(['slug'] == 'social_media')->one();
    $content = json_decode($m['content']);


}

}
