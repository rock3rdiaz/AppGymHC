<?php
/* @var $this EvaluacionMedicaController */
/* @var $model EvaluacionMedica */

$this->breadcrumbs=array(
	'Evaluacion Medicas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EvaluacionMedica', 'url'=>array('index')),
	array('label'=>'Manage EvaluacionMedica', 'url'=>array('admin')),
);
?>

<h1>Create EvaluacionMedica</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>