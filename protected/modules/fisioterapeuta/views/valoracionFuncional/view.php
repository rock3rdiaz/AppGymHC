<?php
$this->breadcrumbs=array(
	'Valoracion Funcional'=>array('create'),
	$model->idValoracion_funcional,
);

/*$this->menu=array(
	array('label'=>'List ValoracionFuncional','url'=>array('index')),
	array('label'=>'Create ValoracionFuncional','url'=>array('create')),
	array('label'=>'Update ValoracionFuncional','url'=>array('update','id'=>$model->idValoracion_funcional)),
	array('label'=>'Delete ValoracionFuncional','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idValoracion_funcional),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ValoracionFuncional','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Detalle de la Valoracion Funcional No.<?php echo $model->idValoracion_funcional; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idValoracion_funcional',
		'objetivo_ejercicio',
		'observaciones',
		'fecha_hora',
		'programa_entrenamiento',
		array('name'=>'idHistoria_GYM', 'label'=>'Codigo historia clinica'),
		array('label'=>'Usuario propietario', 
			'value'=>VUsuarios::model()->getNombreCompleto($model->idHistoriaGYM->idVUsuario)),
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
				'label'=>'Nueva valoracion funcional',
				'url'=>array('create')
	)); 
?>
