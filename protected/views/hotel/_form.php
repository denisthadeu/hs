<?php $textSubmit = ($is_update) ? "Atualizar Hotel" : "Cadastrar Hotel" ?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>
 
    <?php echo $form->errorSummary($model); ?>
    <div class="row-fluid" style="padding-bottom: 10px;">
        <div class="span6 offset1">
            <?php echo $form->label($model,'nome'); ?>
            <?php echo $form->textField($model,'nome', array('class'=>'span12')) ?>
        </div>
        <div class="span2">
            <?php echo $form->label($model,'cnpj'); ?>
            <?php $this->widget('CMaskedTextField',array('model' => $model,'attribute' => 'cnpj','name'=>'Hotel[cnpj]','mask'=>'99.999.999/9999-99','htmlOptions'=>array('class'=>'span12'),)); ?>
        </div>
    </div>
    <div class="row-fluid" style="padding-bottom: 10px;">
        <div class="span4 offset1">
            <?php echo $form->label($model,'nome_proprietario'); ?>
            <?php echo $form->textField($model,'nome_proprietario', array('class'=>'span12')) ?>
        </div>
        <div class="span4">
            <?php echo $form->label($model,'email_proprietario'); ?>
            <?php echo $form->textField($model,'email_proprietario', array('class'=>'span12')) ?>
        </div>
    </div>
    <div class="row-fluid" style="padding-bottom: 10px;">
        <div class="span6 offset1">
            <?php echo $form->label($model,'endereco'); ?>
            <?php echo $form->textField($model,'endereco', array('class'=>'span12')) ?>
        </div>
        <div class="span2">
            <?php echo $form->label($model,'numero'); ?>
            <?php echo $form->textField($model,'numero', array('class'=>'span12')) ?>
        </div>
    </div>
    <div class="row-fluid" style="padding-bottom: 10px;">
        <div class="span2 offset1">
            <?php echo $form->label($model,'complemento'); ?>
            <?php echo $form->textField($model,'complemento', array('class'=>'span12')) ?>
        </div>
        <div class="span2">
            <?php echo $form->label($model,'cep'); ?>
            <?php $this->widget('CMaskedTextField',array('model' => $model,'attribute' => 'cep','name'=>'Hotel[cep]','mask'=>'99999-999','htmlOptions'=>array('class'=>'span12'),)); ?>
        </div>
        <div class="span4">
            <?php echo $form->label($model,'id_filial'); ?>
            <?php echo $form->dropDownList($model, 'id_filial', CHtml::listData($this->affiliate_list,'id','nome'),array('class'=>'span12','empty'=>'Selecione uma filial',));?>
        </div>
    </div>
    <div class="row-fluid" style="padding-bottom: 10px;">
        <div class="span2 offset1">
            <?php echo $form->label($model,'telefone'); ?>
            <?php $this->widget('CMaskedTextField',array('model' => $model,'attribute' => 'telefone','name'=>'Hotel[telefone]','mask'=>'(99)9999-9999?9','htmlOptions'=>array('class'=>'span12'),)); ?>
        </div>
        <div class="span2">
            <?php echo $form->label($model,'telefone2'); ?>
            <?php $this->widget('CMaskedTextField',array('model' => $model,'attribute' => 'telefone2','name'=>'Hotel[telefone2]','mask'=>'(99)9999-9999?9','htmlOptions'=>array('class'=>'span12'),)); ?>
        </div>
        <div class="span2">
            <?php echo $form->label($model,'celular'); ?>
            <?php $this->widget('CMaskedTextField',array('model' => $model,'attribute' => 'celular','name'=>'Hotel[celular]','mask'=>'(99)99999-999?9','htmlOptions'=>array('class'=>'span12'),)); ?>
        </div>
        <div class="span2">
            <?php echo $form->label($model,'fax'); ?>
            <?php $this->widget('CMaskedTextField',array('model' => $model,'attribute' => 'fax','name'=>'Hotel[fax]','mask'=>'(99)9999 999?9','htmlOptions'=>array('class'=>'span12'),)); ?>
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