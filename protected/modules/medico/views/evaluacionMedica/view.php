<?php
/* @var $this EvaluacionMedicaController */
/* @var $model EvaluacionMedica */

$this->breadcrumbs=array(
	'Administrar Evaluacion Medica'=>array('admin'),
	$model->idEvaluacion_medica,
);

/*$this->menu=array(
	array('label'=>'List EvaluacionMedica', 'url'=>array('index')),
	array('label'=>'Create EvaluacionMedica', 'url'=>array('create')),
	array('label'=>'Update EvaluacionMedica', 'url'=>array('update', 'id'=>$model->idEvaluacion_medica)),
	array('label'=>'Delete EvaluacionMedica', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEvaluacion_medica),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EvaluacionMedica', 'url'=>array('admin')),
);*/
?>

<h1>Detalle de la Evaluaci&oacute;n M&eacute;dica No.<?php echo $model->idEvaluacion_medica; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idEvaluacion_medica',
		array('label'=>'Nombre usuario',
			'value'=>VUsuarios::model()->getNombreCompleto($model->idHistoriaGYM->idVUsuario)),
		'enfermedad_actual',
		'fecha_hora',
		//'motivo_consulta',
		'idHistoria_GYM',
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
				'label'=>'Nueva evaluacion medica',
				'url'=>array('create')
	)); 
?>

