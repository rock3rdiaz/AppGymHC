<?php
$this->breadcrumbs=array(
	'Deportes'=>array('admin'),
	$model->idDeporte,
);

/*$this->menu=array(
	array('label'=>'List Deporte','url'=>array('index')),
	array('label'=>'Create Deporte','url'=>array('create')),
	array('label'=>'Update Deporte','url'=>array('update','id'=>$model->idDeporte)),
	array('label'=>'Delete Deporte','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idDeporte),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Deporte','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Detalle de los datos del deporte No.<?php echo $model->idDeporte; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		array('name'=>'idDeporte', 'label'=>'Codigo deporte'),
		array('name'=>'nombre', 'label'=>'Nombre'),
	),
)); ?>

<?php 
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Regresar',
    'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'', // '', 'large', 'small' or 'mini'
    'url'=>array('admin'),
    'icon'=>'white remove',
)); ?>

<?php 
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Nuevo deporte',
    'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'', // '', 'large', 'small' or 'mini'
    'url'=>array('admin'),
    'icon'=>'white ok',
)); ?>
