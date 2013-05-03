<?php
/* @var $this EvaluacionMedicaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Evaluacion Medicas',
);

$this->menu=array(
	array('label'=>'Create EvaluacionMedica', 'url'=>array('create')),
	array('label'=>'Manage EvaluacionMedica', 'url'=>array('admin')),
);
?>

<h1>Evaluacion Medicas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
