<?php
$this->breadcrumbs=array(
	'Ejercicios'=>array('admin'),
	$model->idEjercicio=>array('view','id'=>$model->idEjercicio),
	'Actualizar',
);

/*$this->menu=array(
	array('label'=>'List Ejercicio','url'=>array('index')),
	array('label'=>'Create Ejercicio','url'=>array('create')),
	array('label'=>'View Ejercicio','url'=>array('view','id'=>$model->idEjercicio)),
	array('label'=>'Manage Ejercicio','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Actualizaci&oacute;n del ejercicio No.<?php echo $model->idEjercicio; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>