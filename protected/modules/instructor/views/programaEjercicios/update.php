<?php
$this->breadcrumbs=array(
	'Programa Ejercicioses'=>array('index'),
	$model->idPrograma_ejercicios=>array('view','id'=>$model->idPrograma_ejercicios),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProgramaEjercicios','url'=>array('index')),
	array('label'=>'Create ProgramaEjercicios','url'=>array('create')),
	array('label'=>'View ProgramaEjercicios','url'=>array('view','id'=>$model->idPrograma_ejercicios)),
	array('label'=>'Manage ProgramaEjercicios','url'=>array('admin')),
);
?>

<h1>Update ProgramaEjercicios <?php echo $model->idPrograma_ejercicios; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>