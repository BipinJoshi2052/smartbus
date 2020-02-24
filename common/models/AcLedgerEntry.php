<?php

namespace common\models;

class AcLedgerEntry extends \common\models\generated\AcLedgerEntry {


    public function rules() {
        return array_merge(Parent::rules(), [

        ]);
    }
}
