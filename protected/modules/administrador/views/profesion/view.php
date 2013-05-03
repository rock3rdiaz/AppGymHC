<?php
$this->breadcrumbs=array(
	'Profesions'=>array('admin'),
	$model->idProfesion,
);

/*$this->menu=array(
	array('label'=>'List Profesion','url'=>array('index')),
	array('label'=>'Create Profesion','url'=>array('create')),
	array('label'=>'Update Profesion','url'=>array('update','id'=>$model->idProfesion)),
	array('label'=>'Delete Profesion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idProfesion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Profesion','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Detalle de los datos del profesi&oacute;n No.<?php echo $model->idProfesion; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		array('name'=>'idProfesion', 'label'=>'C&oacute;digo profesi&oacute;n'),
		array('name'=>'nombre', 'label'=>'Nombre'),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'primary',
			'label'=>'Regresar',
                        'icon'=>'white remove',
                        'url'=>array('admin'),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
                    'label'=>'Crear nueva profesion',
                    'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size'=>'', // '', 'large', 'small' or 'mini'
                    'url'=>array('create'),
                    'icon'=>'white ok',
)); ?>