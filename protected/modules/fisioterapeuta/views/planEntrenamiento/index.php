<?php
$this->breadcrumbs=array(
	'Plan Entrenamientos',
);

$this->menu=array(
	array('label'=>'Create PlanEntrenamiento','url'=>array('create')),
	array('label'=>'Manage PlanEntrenamiento','url'=>array('admin')),
);
?>

<h1>Plan Entrenamientos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
