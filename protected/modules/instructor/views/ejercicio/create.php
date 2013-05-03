<?php
$this->breadcrumbs=array(
	'Ejercicios'=>array('admin'),
	'Crear ejercicio',
);

/*$this->menu=array(
	array('label'=>'List Ejercicio','url'=>array('index')),
	array('label'=>'Manage Ejercicio','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Creaci&oacute;n de un ejercicio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>