<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'rating-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</p>

    <?php echo $form->errorSummary($model); ?>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'score'); ?>
        <?php echo $form->textField($model, 'score', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'score'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'key'); ?>
        <?php echo $form->dropDownList($model, 'key', array(
            'today' => 'Сегодня',
            'week' => 'За неделю',
            'month' => 'За месяц',
        )) ?>
        <?php echo $form->error($model, 'key'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Сохранить'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->