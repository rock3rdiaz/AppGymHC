<?php
$this->breadcrumbs=array(
	'Administracion empleados'=>array('admin'),
	$model->idEmpleado,
);

/*$this->menu=array(
	array('label'=>'List Empleado','url'=>array('index')),
	array('label'=>'Create Empleado','url'=>array('create')),
	array('label'=>'Update Empleado','url'=>array('update','id'=>$model->idEmpleado)),
	array('label'=>'Delete Empleado','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idEmpleado),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Empleado','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Detalle de los datos del empleado No.<?php echo $model->idEmpleado; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		array('name'=>'idEmpleado', 'label'=>'C&oacute;digo del empleado'),
		'nombres',
		'apellidos',
		array('name'=>'idCargo', 'label'=>'C&oacute;digo del cargo'),
                array('label'=>'Nombre del cargo', 'value'=>$model->idCargo0->nombre),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'primary',
			'label'=>'Regresar',
                        'icon'=>'white remove',
                        'url'=>array('admin'),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
                    'label'=>'Crear nuevo empleado',
                    'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size'=>'', // '', 'large', 'small' or 'mini'
                    'url'=>array('create'),
                    'icon'=>'white ok',
)); ?>