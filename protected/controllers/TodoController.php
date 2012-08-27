<?php

class TodoController Extends Controller {

    public function actionIndex() {

        
        $criteria = new EMongoCriteria;
        $criteria->sort('timestamp', SORT_DESC);

        $model = TodoDemo::model()->findAll($criteria);
        $this->render('index', array('model' => $model));
    }

    /* public function actionAdd() {
      $model = new TodoDemo();
      if (isset($_POST['TodoDemo'])) {
      $model->attributes = $_POST['TodoDemo'];

      if ($model->validate() && $model->save()) {
      $this->redirect(array('todo/index'));
      }
      }
      $this->render('add', array('model' => $model));
      }
     */

    public function actionDisplay($id) {

        $model = TodoDemo::model()->findByPk($id);
        $this->render('display', array('model' => $model));
    }

    /* public function actionUpdate($id) {
      $model = TodoDemo::model()->findByPk($id);

      if (isset($_POST['TodoDemo'])) {

      $model->attributes = $_POST['TodoDemo'];
      if ($model->validate() && $model->save())
      $this->redirect(array('todo/index'));
      }
      $this->render('update', array(
      'model' => $model,
      ));
      } */

    /*   public function actionDelete($id) {

      $model = TodoDemo::model()->findByPk($id);
      $model->delete();
      $this->redirect(array('todo/index'));
      } */

    public function actionDelete() {
        $id = $_POST['id'];
        if (Yii::app()->request->isAjaxRequest) {
            $model = TodoDemo::model()->findByPk($id);
            if ($model->delete()) {
                echo json_encode(array('id' => $id, 'message' => 'its deleted'));
            }

            Yii::app()->end();
        }
    }

    public function actionUpdate() {


        if (Yii::app()->request->isAjaxRequest) {
            $id = $_POST['id'];
            $model = TodoDemo::model()->findByPk($id);

            if (isset($_POST['id'])) {

                $model->title = $_POST['title'];
                $model->content = $_POST['content'];
                if ($model->validate() && $model->save())
                    echo json_encode(array('id' => $id, 'message' => 'its updated'));
            }
        }
    }

    public function actionAdd() {
        header('Content-type: application/json');
        if (Yii::app()->request->isAjaxRequest) {
            $model = new TodoDemo();
            if (isset($_POST['title'])) {
                $model->title = $_POST['title'];
                $model->content = $_POST['content'];

                if ($model->validate() && $model->save()) {

                    echo json_encode(array('status' => 'success', 'update' => $this->renderPartial('_rows', array('model' => $model), true)));
                    //echo json_encode(array('title' => $_POST['title'],'content'=>$_POST['content']));
                    Yii::app()->end();
                }
            }
        }
    }

}
