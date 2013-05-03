<?php
$this->breadcrumbs=array(
	'Profesions'=>array('index'),
	$model->idProfesion=>array('view','id'=>$model->idProfesion),
	'Update',
);

/*$this->menu=array(
	array('label'=>'List Profesion','url'=>array('index')),
	array('label'=>'Create Profesion','url'=>array('create')),
	array('label'=>'View Profesion','url'=>array('view','id'=>$model->idProfesion)),
	array('label'=>'Manage Profesion','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Actualizaci&oacute;n datos de la profesion No.<?php echo $model->idProfesion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>