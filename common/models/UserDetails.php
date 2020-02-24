<?php

namespace common\models;

class UserDetails extends \common\models\generated\UserDetails {
    public function rules() {

        return array_merge(Parent::rules(), [
                [['company', 'address', 'phone', 'citizenship', 'license_no', 'contact_person_name', 'contact_person_phone', 'company_registration_number', 'contact_person_email', 'pan_number'], 'filter', 'filter' => 'trim'],
                [['citizenship', 'license_no', 'company_registration_number', 'pan_number'], 'filter', 'filter' => 'strtoupper'],
                [['citizenship','license_no', 'company_registration_number', 'pan_number'], 'unique', 'targetClass' => '\common\models\UserDetails'],
                [['citizenship','license_no', 'company_registration_number', 'pan_number'], 'default', 'value' => null],
                [['is_vat'], 'default', 'value' => 1],
                [['commission_percentage','discount'], 'default', 'value' => 0],

        ]);
    }


}
