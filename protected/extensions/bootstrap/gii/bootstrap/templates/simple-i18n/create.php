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
	Yii::t('{$this->modelClass}', '$label',2) => array('index'),
	'Criar',
);
?>\n";

?>

<h1>Criando <?php echo "<?php echo Yii::t('{$this->modelClass}', '$label',1); ?>"; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
