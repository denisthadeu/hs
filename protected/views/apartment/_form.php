<?php $textSubmit = ($is_update) ? "Atualizar Apartamento" : "Cadastrar Apartamento" ?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>
 
    <?php echo $form->errorSummary($model); ?>
    <div class="row-fluid" style="padding-bottom: 10px;">
        <div class="span2 offset1">
            <?php echo $form->label($model,'id_hotel'); ?>
            <?php echo $form->dropDownList($model, 'id_hotel', CHtml::listData($this->Apartment_list,'id','nome'),array('class'=>'span12','empty'=>'Selecione um hotel',));?>
        </div>
        <div class="span2">
            <?php echo $form->label($model,'bloco'); ?>
            <?php echo $form->textField($model,'bloco', array('class'=>'span12')) ?>
        </div>
        <div class="span2">
            <?php echo $form->label($model,'apartamento'); ?>
            <?php echo $form->textField($model,'apartamento', array('class'=>'span12')) ?>
        </div>
        <div class="span2">
            <?php echo $form->label($model,'telefone'); ?>
            <?php $this->widget('CMaskedTextField',array('model' => $model,'attribute' => 'telefone','name'=>'Hotel[telefone]','mask'=>'(99)9999-9999?9','htmlOptions'=>array('class'=>'span12'),)); ?>
        </div>
    </div>
    <div class="row-fluid" style="padding-bottom: 10px;">
        <div class="span2 offset1">
            <?php echo $form->label($model,'cama_casal'); ?>
            <?php echo $form->textField($model,'cama_casal', array('class'=>'span12 ')) ?>
        </div>
        <div class="span2">
            <?php echo $form->label($model,'cama_solteiro'); ?>
            <?php echo $form->textField($model,'cama_solteiro', array('class'=>'span12')) ?>
        </div>
        <div class="span2">
            <?php echo $form->label($model,'banheiro'); ?>
            <?php echo $form->textField($model,'banheiro', array('class'=>'span12')) ?>
        </div>
        <div class="span2">
            <?php echo $form->label($model,'frigobar'); ?>
            <?php echo $form->textField($model,'frigobar', array('class'=>'span12')) ?>
        </div>
    </div>
        <div class="row-fluid center" style="padding-bottom: 10px;">
        <div class="span8 offset1">
            <?php echo CHtml::button('Voltar',array('name' => 'btnBack','onclick'=>'js:history.go(-1);returnFalse;','class'=>'btn')); ?>
            <?php echo CHtml::submitButton($textSubmit, array('class' => 'btn btn-primary')); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->