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

    use common\models\Settings;
    use yii\base\Component;

    class HelperSettings extends Component {

        public static function update($settings) {
            foreach ($settings as $key => $setting) {
                $model = Settings::findOne($key);
                $model->content = $setting;
                $model->update();
            }
            return;
        }

        public static function getSettings() {
            $data = Query::queryAll("SELECT * FROM `settings`");
            $settings = [];
            foreach ($data as $setting) {
                $settings[$setting['slug']] = $setting;
            }
            return Misc::exists($settings, FALSE);
        }
    }