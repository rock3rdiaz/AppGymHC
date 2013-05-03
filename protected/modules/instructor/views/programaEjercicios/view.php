<?php
$this->breadcrumbs=array(
	'Programa Ejercicios'=>array('admin'),
	$model->idPrograma_ejercicios,
);

/*$this->menu=array(
	array('label'=>'List ProgramaEjercicios','url'=>array('index')),
	array('label'=>'Create ProgramaEjercicios','url'=>array('create')),
	array('label'=>'Update ProgramaEjercicios','url'=>array('update','id'=>$model->idPrograma_ejercicios)),
	array('label'=>'Delete ProgramaEjercicios','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idPrograma_ejercicios),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProgramaEjercicios','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Detalle del Programa de ejercicios No. <?php echo $model->idPrograma_ejercicios; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idPrograma_ejercicios',
		'fecha_realizacion',
		'observaciones',
		'idPlan_entrenamiento',
	),
)); ?>


