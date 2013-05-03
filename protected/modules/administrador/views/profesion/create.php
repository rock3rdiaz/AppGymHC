<?php
$this->breadcrumbs=array(
	'Profesions'=>array('index'),
	'Create',
);

/*$this->menu=array(
	array('label'=>'List Profesion','url'=>array('index')),
	array('label'=>'Manage Profesion','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Creaci&oacute;n de una profesi&oacute;n</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>