<?php

namespace common\models;

class ClientPageContents extends \common\models\generated\ClientPageContents {
    public function rules() {
        return array_merge(Parent::rules(), [
        ]);
    }


}

