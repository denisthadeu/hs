<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>false,
)); ?>\n"; ?>

	<p class="help-block well">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<?php echo "<?php echo ".$this->generateActiveRow($this->modelClass,$column)."; ?>\n"; ?>

<?php
}
?>
	
	<div class="form-actions">
		<div class="row-fluid">
			<div class="span2">
				<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
							'buttonType'=>'link',
							'size' => 'large',
							'label'=> 'Voltar',
							'block' => true,
							'url'=> \$this->createUrl('index')
					)); ?>\n"; ?>
			</div>        
			<div class="span2">         
				<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
							'buttonType'=>'submit',
							'size' => 'large',
							'type'=>'primary',
							'block'=> true,
							'label'=>\$model->isNewRecord ? 'Criar' : 'Gravar',
					)); ?>\n"; ?>
			</div>        
		</div>
    </div> 

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
