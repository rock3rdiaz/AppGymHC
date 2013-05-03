<?php
$this->breadcrumbs=array(
	'Examens'=>array('index'),
	$model->idExamen,
);

/*$this->menu=array(
	array('label'=>'List Examen','url'=>array('index')),
	array('label'=>'Create Examen','url'=>array('create')),
	array('label'=>'Update Examen','url'=>array('update','id'=>$model->idExamen)),
	array('label'=>'Delete Examen','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idExamen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Examen','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Detalle de los datos del ex&aacute;men No.<?php echo $model->idExamen; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
        array('name'=>'idExamen', 'label'=>'C&oacute;digo ex&aacute;men'),
        array('label'=>'Nombre del usuario', 
        	'value'=>VUsuarios::model()->getNombreCompleto($model->idEvaluacionMedica->idHistoriaGYM->idVUsuario)),
		'descripcion',
		'fecha_expedicion',
		'fecha_realizacion',		
		'resultado'
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
    'label'=>'Crear nuevo examen',
    'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'', // '', 'large', 'small' or 'mini'
    'url'=>array('create'),
    'icon'=>'white ok',
)); ?>
