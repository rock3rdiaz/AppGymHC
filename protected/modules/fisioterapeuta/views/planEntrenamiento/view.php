<?php
$this->breadcrumbs=array(
	'Plan de Entrenamiento'=>array('admin'),
	$model->idPlan_entrenamiento,
);

/*$this->menu=array(
	array('label'=>'List PlanEntrenamiento','url'=>array('index')),
	array('label'=>'Create PlanEntrenamiento','url'=>array('create')),
	array('label'=>'Update PlanEntrenamiento','url'=>array('update','id'=>$model->idPlan_entrenamiento)),
	array('label'=>'Delete PlanEntrenamiento','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idPlan_entrenamiento),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlanEntrenamiento','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Detalle del Plan de entrenamiento No.<?php echo $model->idPlan_entrenamiento; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idPlan_entrenamiento',
		array('label'=>'Nombre propietario', 
			'value'=>VUsuarios::model()->getNombreCompleto($model->idValoracionFuncional->idHistoriaGYM->idVUsuario)),
		'idValoracion_funcional',
		'fecha_creacion',
		'objetivo',
		'tipo_trabajo',
		'saludable',
		'recomendaciones',		
		
		array('label'=>'Minutos de trabajo continuo', 'value'=>$model->trabajoCardiovasculars[0]->continuo),
		array('label'=>'Minutos de trabajo en intervalo', 'value'=>$model->trabajoCardiovasculars[0]->intervalo),
		array('label'=>'Minutos de trabajo en circuito', 'value'=>$model->trabajoCardiovasculars[0]->circuito_estaciones),
		array('label'=>'Categoria', 'value'=>$model->trabajoCardiovasculars[0]->categoria),

		array('label'=>'Nivel', 'value'=>$model->trabajoEstiramientos[0]->nivel),
		array('label'=>'Retracciones musculares', 'value'=>$model->trabajoEstiramientos[0]->retracciones_musculares),
		array('label'=>'Series', 'value'=>$model->trabajoEstiramientos[0]->series),
		array('label'=>'Segundos', 'value'=>$model->trabajoEstiramientos[0]->segundos),

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
				'label'=>'Nuevo plan de entrenamiento',
				'url'=>array('create')
	)); 
?>

