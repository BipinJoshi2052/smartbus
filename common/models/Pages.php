<?php

    namespace common\models;


    class Pages extends \common\models\generated\Pages {
        /**
         * @inheritdoc
         */
        public function rules() {
            return [
                [['label', 'name'], 'filter', 'filter' => 'trim'],

            ];
        }

    }
