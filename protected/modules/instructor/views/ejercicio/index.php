<?php
$this->breadcrumbs=array(
	'Ejercicios',
);

$this->menu=array(
	array('label'=>'Create Ejercicio','url'=>array('create')),
	array('label'=>'Manage Ejercicio','url'=>array('admin')),
);
?>

<h1>Ejercicios</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
