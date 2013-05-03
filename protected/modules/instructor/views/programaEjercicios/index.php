<?php
$this->breadcrumbs=array(
	'Programa Ejercicioses',
);

$this->menu=array(
	array('label'=>'Create ProgramaEjercicios','url'=>array('create')),
	array('label'=>'Manage ProgramaEjercicios','url'=>array('admin')),
);
?>

<h1>Programa Ejercicioses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
