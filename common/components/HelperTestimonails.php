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

    use common\models\Testimonials;
    use yii\base\Component;

    class HelperTestimonails extends Component {
        public static function deleteTestimonial($id) {
            $model = Testimonials::findOne($id);
            if($model->delete())
            {
                Misc::delete_file($model->image, 'image');
               return json_encode(true);
            }
            return    json_encode(false);
        }
        public static function set($data, $image) {
            $id = Misc::decrypt($data['id']);
            if (isset($id) && $id > 0) {
                $model = testimonials::findOne($id);
            }
            else {
                $model = new testimonials;
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
                    Misc::setFlash('danger', 'image not uploaded. Please Try again');
                }
            }
            if (!($model->save() == FALSE)) {
                return $model;
            }
            Misc::setFlash('danger', 'Data not uploaded. Please Try again');
            return FALSE;
        }

        public static function getTestimonial() {
            $testimonial = Testimonials::find()->orderBy(['id'=>SORT_DESC])->asArray()->all();
            return $testimonial;
        }
    }