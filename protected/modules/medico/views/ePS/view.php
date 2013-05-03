<?php
$this->breadcrumbs=array(
	'EPS'=>array('admin'),
	$model->idEPS,
);

/*$this->menu=array(
	array('label'=>'List EPS','url'=>array('index')),
	array('label'=>'Create EPS','url'=>array('create')),
	array('label'=>'Update EPS','url'=>array('update','id'=>$model->idEPS)),
	array('label'=>'Delete EPS','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idEPS),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EPS','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Detalle de los datos de la EPS No.<?php echo $model->idEPS; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idEPS',
		'nombre',
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
    'label'=>'Nueva EPS',
    'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'', // '', 'large', 'small' or 'mini'
    'url'=>array('create'),
    'icon'=>'white ok',
)); ?>