<?php
$this->breadcrumbs=array(
	'Deportes',
);

$this->menu=array(
	array('label'=>'Create Deporte','url'=>array('create')),
	array('label'=>'Manage Deporte','url'=>array('admin')),
);
?>

<h1>Deportes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
