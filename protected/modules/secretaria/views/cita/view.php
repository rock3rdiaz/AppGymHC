<?php
$this->breadcrumbs=array(
	'Citas'=>array('admin'),
	$model->idCita,
);

/*$this->menu=array(
	array('label'=>'List Cita','url'=>array('index')),
	array('label'=>'Create Cita','url'=>array('create')),
	array('label'=>'Update Cita','url'=>array('update','id'=>$model->idCita)),
	array('label'=>'Delete Cita','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idCita),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cita','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Detalle de los datos de la cita No.<?php echo $model->idCita; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		array('name'=>'idCita', 'label'=>'Codigo de la cita'),
		array('name'=>'idVUsuario', 'label'=>'Nombre del usuario',
			'value'=>VUsuarios::model()->getNombreCompleto($model->idVUsuario)),
		array('name'=>'tipo', 'label'=>'Tipo',
                    'value'=>($model->tipo == "medica"?"Evaluacion medica":"Valoracion funcional")),
		'fecha',
		array('name'=>'motivo', 'value'=>ucfirst($model->motivo)),
		array('name'=>'estado', 'value'=>ucfirst($model->estado)),
		array('name'=>'Empleado_idEmpleado', 'label'=>'Empleado que diagnostica',
					'value'=>($model->empleadoIdEmpleado->nombres.' '.$model->empleadoIdEmpleado->apellidos)),		
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
                    'label'=>'Regresar',
                    'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size'=>'', // '', 'large', 'small' or 'mini'
                    'url'=>array('admin'),
                    'icon'=>'white remove',
                )); ?>
                
<?php $this->widget('bootstrap.widgets.TbButton', array(
                    'label'=>'Crear nueva cita',
                    'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size'=>'', // '', 'large', 'small' or 'mini'
                    'url'=>array('create'),
                    'icon'=>'white ok',
                )); ?>
