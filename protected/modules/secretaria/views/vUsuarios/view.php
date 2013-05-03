<?php
$this->breadcrumbs=array(
	'Vusuarioses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List VUsuarios','url'=>array('index')),
	array('label'=>'Create VUsuarios','url'=>array('create')),
	array('label'=>'Update VUsuarios','url'=>array('update','id'=>$model->)),
	array('label'=>'Delete VUsuarios','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VUsuarios','url'=>array('admin')),
);
?>

<h1>View VUsuarios #<?php echo $model->; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_usuarios',
		'identificacion',
		'tipo_identificacion',
		'primer_nombre',
		'segundo_nombre',
		'primer_apellido',
		'segundo_apellido',
		'sexo',
		'fecha_nac',
		'fecha_ingreso',
		'direccion',
		'telefono',
		'celular',
		'mail',
		'tipo',
		'categoria',
		'estado',
		'tipo_ingreso',
		'id_grupo',
		'id_profesion',
	),
)); ?>
