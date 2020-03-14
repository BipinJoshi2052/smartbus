<?php

namespace frontend\controllers;

use common\components\Helper;
use \common\components\HelperAPI;
use common\components\Misc;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\components\Curl;


/**
 * Clients controller
 */
class SearchController extends controller {

    public function actionIndex() {

        return $this->render('index');
    }



}
