<?php

class Register extends EMongoDocument {

    public $id;
    public $name;
    public $address;

    public function primaryKey() {

        return 'id';
    }

    public function getCollectionName() {
        return 'register';
    }

    public function rules() {
        return array(
            array('name,address', 'required'),
        );
    }

    public function attributeLabels() {
        return array(
            'name' => 'Name',
            'address' => 'Address',
        );
    }

    public function beforeSave() {

        if ($this->isNewRecord) {
            $this->id = uniqid();
        }

        return parent::beforeSave();
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
