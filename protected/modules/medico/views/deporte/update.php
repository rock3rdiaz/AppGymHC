<?php
$this->breadcrumbs=array(
	'Deportes'=>array('admin'),
	$model->idDeporte=>array('view','id'=>$model->idDeporte),
	'Actualizar deporte',
);

/*$this->menu=array(
	array('label'=>'List Deporte','url'=>array('index')),
	array('label'=>'Create Deporte','url'=>array('create')),
	array('label'=>'View Deporte','url'=>array('view','id'=>$model->idDeporte)),
	array('label'=>'Manage Deporte','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Actualizaci&oacute;n datos del deporte No. <?php echo $model->idDeporte; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>