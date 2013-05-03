<?php
$this->breadcrumbs=array(
	'Profesions',
);

$this->menu=array(
	array('label'=>'Create Profesion','url'=>array('create')),
	array('label'=>'Manage Profesion','url'=>array('admin')),
);
?>

<h1>Profesions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
