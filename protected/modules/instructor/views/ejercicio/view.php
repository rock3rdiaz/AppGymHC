<?php
$this->breadcrumbs=array(
	'Ejercicios'=>array('admin'),
	$model->idEjercicio,
);

/*$this->menu=array(
	array('label'=>'List Ejercicio','url'=>array('index')),
	array('label'=>'Create Ejercicio','url'=>array('create')),
	array('label'=>'Update Ejercicio','url'=>array('update','id'=>$model->idEjercicio)),
	array('label'=>'Delete Ejercicio','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idEjercicio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ejercicio','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Detalle del ejercicio No.<?php echo $model->idEjercicio; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idEjercicio',
		'seccion_trabajo',
		'descripcion',
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
				'type'=>'primary',
	            'icon'=>'white remove',
				'label'=>'Regresar',
				'url'=>array('admin')
	)); 
?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
				'type'=>'primary',
	            'icon'=>'white ok',
				'label'=>'Nuevo ejercicio',
				'url'=>array('create')
	)); 
?>


