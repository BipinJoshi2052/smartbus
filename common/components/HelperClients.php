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
    use yii\base\Component;

    class HelperClients extends Component {
        public static function set($data, $image) {
            if (isset($data['id']) && $data['id'] > 0) {
                $model = Clients::findOne($data['id']);
            }
            else {
                $model = new Clients;
            }
            $model->attributes = $data;

            if (isset($image['name']) && $image['name'] != '') {
                if ($model->image != '') {
                    Misc::delete_file($model->image, 'image');
                }
                $upload = HelperUpload::upload($image);
                if ($upload != FALSE) {
                    $model->image = $upload;
                }
                else {
                    Misc::setFlash('danger', 'Logo not uploaded. Please Try again');
                }

            }
            if (!($model->save() == FALSE)) {
                return $model;
            }
            Misc::setFlash('danger', 'Data not uploaded. Please Try again');
            return FALSE;

        }
    }