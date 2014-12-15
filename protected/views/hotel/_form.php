<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>
 
    <?php echo $form->errorSummary($model); ?>
 
    <div class="row">
        <?php echo $form->label($model,'nome'); ?>
        <?php echo $form->textField($model,'nome') ?>
    </div>
 
    <div class="row">
        <?php echo $form->label($model,'cnpj'); ?>
        <?php echo $form->textField($model,'cnpj') ?>
    </div>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Criar Hotel', array('class' => 'btn btn-primary')); ?>
    </div>
 
<?php $this->endWidget(); ?>
</div><!-- form -->