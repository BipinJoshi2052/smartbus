<?php

namespace backend\controllers;

use common\components\Helper;
use common\components\HelperNews;
use common\components\Misc;
use common\models\Blog;
use common\models\News;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


/**
 * Clients controller
 */
class NewsController extends Controller {
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
        //        $this->permissions = Helper::checkAuthority(Yii::$app->controller->id, Yii::$app->controller->action->id);


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
     * @return string
     */
    public function actionIndex() {
        $page = 'news';
        return $this->render('index', [
                'news' => HelperNews::getNews(),
                //                'page' => Yii::$app->params['pages'][$page],
        ]);
    }

    public function actionView() {
        return $this->render('View');
    }

    public function actionForm() {

        return $this->render('form', [

                'categories' => HelperNews::getcategories(),
        ]);
    }

    public function actionPost($id = '') {
        $post = [];
        if ($id != '') {
            $id = Misc::decrypt($id);
            $post = HelperNews::getSingleNews($id);
        }
        return $this->render('form', [
                'categories' => HelperNews::getCategories(),
                'editable'   => $post,
        ]);
    }

    public function actionUpdate() {
        $data = Yii::$app->request->post();
        HelperNews::set($data, (isset($_FILES['image']) && !empty($_FILES['image'])) ? $_FILES['image'] : '');
        $this->redirect(Yii::$app->request->baseUrl . '/news/');
    }

    public function actionDelete() {
        if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
            return HelperNews::deleteNews($_POST['id']);
        }

    }

    //News category section
    public function actionCategories() {
        return $this->render('category/viewCat', [
                'newsCat' => HelperNews::getNewsCat(),
        ]);
    }

    public function actionDeleteNewsCategory() {
        if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
            return HelperNews::deleteNewsCategory($_POST['id']);
        }

    }

    public function actionList() {
        return $this->render('category/category');
    }

    public function actionUp() {
        $data = Yii::$app->request->post();
        HelperNews::setCat($data);
        $this->redirect(Yii::$app->request->baseUrl . '/news/categories');

    }

    public function actionEditCategory($id = '') {

        $post = [];
        if ($id != '') {
            $id = Misc::decrypt($id);
            $post = HelperNews::getSingleCat($id);
        }
        return $this->render('category/category', [

                'editable' => $post,
        ]);
    }

    public function actionStatus() {
        $post = Yii::$app->request->post();
        if (isset($post['active'])) {
            $change = HelperNews::Status($post['news']);
            $change['is_active'] = 0;
            HelperNews::setStatus($change);

        }
        else {
            $change = HelperNews::Status($post['news']);
            $change['is_active'] = 1;
            HelperNews::setStatus($change);
        }

        $this->redirect(Yii::$app->request->baseUrl . '/news/');

    }
}
