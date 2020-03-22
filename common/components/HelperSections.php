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

    use common\models\Pages;
    use common\models\Sections;
    use common\models\Settings;
    use yii\base\Component;

    class HelperSections extends Component {
        public static function deleteSections($id)
        {

            $model = Sections::findOne($id);
            if($model->delete())
            {
                Misc::delete_file($model->image, 'image');
                return json_encode(true);
            }
            return json_encode(false);
        }
//        public static function removeLink($id,$m)
//        {
//
//            $model = Settings::find()->where('slug = social_media')->andWhere('content');
//            if($model->delete())
//            {
//                Misc::delete_file($model->image, 'image');
//                return json_encode(true);
//            }
//            return json_encode(false);
//        }
        public static function set($data, $image) {
        $id=Misc::decrypt($data['id']);

            if (isset($id) && $id > 0) {
                $model = Sections::findOne($id);
            }
            else {
                $model = new Sections;
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
                    Misc::setFlash('danger', 'Image not uploaded. Please Try again');
                }
            }
            if (!($model->save() == FALSE)) {

                Misc::setFlash('success', 'Section Updated.');
                return $model;
            }
            Misc::setFlash('danger', 'Data not uploaded. Please Try again');
            return FALSE;

        }
        public static function setPage($data, $image) {
            $on_menu=  array();
            $on_menu = $data['on_menu'];
            $encode =\GuzzleHttp\json_encode($on_menu);
            if (isset($data['page']['id']) && $data['page']['id'] > 0) {
                $model = Pages::findOne($data['page']['id']);
            }
            else {
                $model = new Pages;
            }
            $model->label =$data['page']['label'];
            $model->on_menu = $encode;
            $model->page_status =$data['page']['page_status'];
            if (isset($image['name']) && $image['name'] != '') {
                if ($model->image != '') {
                    Misc::delete_file($model->image, 'image');
                }
                $upload = HelperUpload::upload($image);
                if ($upload != FALSE) {
                    $model->image = $upload;
                }

                else {
                    Misc::setFlash('danger', 'Image not uploaded. Please Try again');
                }
            }
            if (!($model->save() == FALSE)) {
                Misc::setFlash('success', 'Section Updated.');
                return $model;
            }

            Misc::setFlash('danger', 'Data not uploaded. Please Try again');
            return FALSE;

        }
    }