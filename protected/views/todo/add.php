<div class="form">

    
    <?php echo 'bye'; ?>
    <?php $form = $this->beginWidget('CActiveForm'); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo CHtml::errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 80, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content'); ?>
        <?php echo CHtml::activeTextArea($model, 'content', array('rows' => 10, 'cols' => 70)); ?>
        <?php echo $form->error($model, 'content'); ?>
    </div>



    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>
