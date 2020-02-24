<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Description of settings
     * @author Chetan Rajbhandari
     */

    namespace common\components;

    use common\models\Clients;
    use common\models\Locations;
    use yii\base\Component;

    class HelperRoutes extends Component {
        public static function setLocation($data) {
            if (isset($data['id']) && $data['id'] > 0) {
                $model = Locations::findOne($data['id']);
            }
            else {
                $model = new Locations;
            }
            $model->attributes = $data;

            if (!($model->save() == FALSE)) {
                return $model;
            }
            Misc::setFlash('danger', 'Data not uploaded. Please Try again');
            return FALSE;

        }
    }