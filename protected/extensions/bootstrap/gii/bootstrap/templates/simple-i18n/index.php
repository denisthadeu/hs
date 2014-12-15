<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$class=@Yii::import($this->modelClass,true);
$table=CActiveRecord::model($class)->tableSchema;
$label=$table->name;
echo "\$this->breadcrumbs=array(
	Yii::t('{$this->modelClass}', '$label',2)
);
?>\n";

echo "<?php \$this->widget('bootstrap.widgets.TbAlert', array(      
    )); ?>\n";

?>
    
<div class="row">
  <div class="span9">    
    <h1><?php echo "<?php echo Yii::t('{$this->modelClass}', '$label',2); ?>"; ?></h1>
  </div>
  <div class="span2 offset1">
		<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbButton', array(
    	'label'=>'Criar ' . Yii::t('<?php echo $this->modelClass; ?>', '<?php echo $label; ?>',1),
    	'type'=>'primary', 
    	'size'=>'large', 
    	'url' => array('create'),
    	'block' => true
    ));
    ?>
  </div>
</div>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(

			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{update} {delete}',

		),
	),
)); ?>
