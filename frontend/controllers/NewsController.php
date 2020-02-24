<?php
/*
 * @author Chetan Rajbhandari
 */

namespace frontend\controllers;

use common\components\HelperNews;
use common\components\Misc;
use common\models\LoginForm;
use common\models\News;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;

/**
 * Search controller
 */
class NewsController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return ['error' => ['class' => 'yii\web\ErrorAction',], 'captcha' => ['class' => 'yii\captcha\CaptchaAction', 'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,],];
    }

    public function beforeAction($action) {
        if ($action->id == 'error') {
            $this->layout = 'error';
        }

        return parent::beforeAction($action);
    }

    /**
     * Displays homepage.
     * @return mixed
     */
    public function actionIndex() {
        $query = News::find();
        $pages = new Pagination([
                                        'defaultPageSize' => 5,
                                        'totalCount'      => $query->count()
                                ]);
        $news = $query->orderBy('id')
                      ->offset($pages->offset)
                      ->limit($pages->limit)
                      ->all();
        return $this->render('index', [
                'news'  => $news,
                'pages' => $pages
        ]);
    }

    public function actionPost($id = '') {
        //            return $this->render('single');
        if ($id != '') {
            $id = Misc::decrypt($id);
            //
            return $this->render('single', ['post' => HelperNews:: getSingleNews($id)]);
        }
        return false;
    }
}
