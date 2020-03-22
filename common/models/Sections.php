<?php

    namespace common\models;

    use common\models\generated\Pages;

    class Sections extends \common\models\generated\Sections {

        /**
         * @inheritdoc
         */
        public function rules() {
        return array_merge(Parent::rules(), [
                [['title', 'sub_title', 'content'], 'filter', 'filter' => 'trim'],
        ]);
        }
        public function getPage()
        {
            return $this->hasOne(Pages::className(), ['id' => 'page_id']);
        }
    }
