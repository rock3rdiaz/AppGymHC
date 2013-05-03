<?php
$this->breadcrumbs=array(
	'Administracion de Enfermedades'=>array('admin'),
	$model->idEnfermedad,
);

/*$this->menu=array(
	array('label'=>'List Enfermedad','url'=>array('index')),
	array('label'=>'Create Enfermedad','url'=>array('create')),
	array('label'=>'Update Enfermedad','url'=>array('update','id'=>$model->idEnfermedad)),
	array('label'=>'Delete Enfermedad','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idEnfermedad),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Enfermedad','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Detalle de los datos de la enfermedad No.<?php echo $model->idEnfermedad; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		array('name'=>'idEnfermedad', 'label'=>'C&oacute;digo enfermedad'),		
		'descripcion',
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
    'label'=>'Nueva enfermedad',
    'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'', // '', 'large', 'small' or 'mini'
    'url'=>array('create'),
    'icon'=>'white ok',
)); ?>

