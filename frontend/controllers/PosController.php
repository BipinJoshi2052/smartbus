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
class PosController extends \common\controllers\PosController {
    public function getViewPath() {
        return '@common/views/pos';
    }
}
