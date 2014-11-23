<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Fale Conosco</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
Se você tem alguma dúvida sobre o sistema, ou quer se cadastrar e começar a usar o sistema, por favor, preencha os campos do formulário e entre em contato conosco. Obrigado.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Campos com <span class="required" style="color: red">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            <span class="span3">
                <?php echo $form->labelEx($model,'Nome <span class="required" style="color: red">*</span>'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
            </span>
            <span class="span3">
                <?php echo $form->labelEx($model,'E-mail <span class="required" style="color: red">*</span>'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
            </span>
	</div>

	<div class="row">
            <span class="span6">
		<?php echo $form->labelEx($model,'Mensagem <span class="required" style="color: red">*</span>'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50, 'style' => 'width: 89%')); ?>
		<?php echo $form->error($model,'body'); ?>
            </span>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
            <span class="span6">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<?php echo $form->error($model,'verifyCode'); ?>
            </span>
	</div>
	<?php endif; ?>

	<div class="row buttons">
            <span class="span6">
		<?php echo CHtml::submitButton('Enviar', array('class' => 'btn btn-primary')); ?>
            </span>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>