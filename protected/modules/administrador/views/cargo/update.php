<?php
$this->breadcrumbs=array(
	'Cargos'=>array('index'),
	$model->idCargo=>array('view','id'=>$model->idCargo),
	'Update',
);

/*$this->menu=array(
	array('label'=>'List Cargo','url'=>array('index')),
	array('label'=>'Create Cargo','url'=>array('create')),
	array('label'=>'View Cargo','url'=>array('view','id'=>$model->idCargo)),
	array('label'=>'Manage Cargo','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Actuaizaci&oacute;n de datos del cargo <?php echo $model->idCargo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>