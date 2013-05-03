<?php
$this->breadcrumbs=array(
	'Enfermedades'=>array('admin'),
	$model->idEnfermedad=>array('view','id'=>$model->idEnfermedad),
	'Actualizar efermedad',
);

/*$this->menu=array(
	array('label'=>'List Enfermedad','url'=>array('index')),
	array('label'=>'Create Enfermedad','url'=>array('create')),
	array('label'=>'View Enfermedad','url'=>array('view','id'=>$model->idEnfermedad)),
	array('label'=>'Manage Enfermedad','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Actualizaci&oacute;n datos de la  enfermedad  No. <?php echo $model->idEnfermedad; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>