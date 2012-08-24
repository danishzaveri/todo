<?php

class RegisterController Extends Controller {

    public function actionIndex() {
        $model = Register::model()->findAll();
        $this->render('display', array('model' => $model));
    }

    public function actionAdd() {
        $model = new Register;
        if (isset($_POST['Register'])) {
            $model->attributes = $_POST['Register'];
            if ($model->validate() && $model->save()) {
                $this->redirect(array('register/display'));
            }
        }
        $this->render('add', array('model' => $model));
    }

    public function actionDisplay() {

        $model = Register::model()->findAll();
        //print_r($model);

        $this->render('display', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = Register::model()->findByPk($id);

        if (isset($_POST['Register'])) {

            $model->attributes = $_POST['Register'];
            if ($model->validate() && $model->save())
                $this->redirect(array('register/display', /* 'id' => $model->id */));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {

        $model = Register::model()->findByPk($id);
        $model->delete();
        $this->redirect(array('register/display'));
    }

    public function actionView($id) {


        $model = Register::model()->findByPk($id);
        $this->render('view', array(
            'model' => $model,
        ));
    }

}

