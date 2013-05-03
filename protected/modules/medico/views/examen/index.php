<?php
$this->breadcrumbs=array(
	'Examens',
);

$this->menu=array(
	array('label'=>'Create Examen','url'=>array('create')),
	array('label'=>'Manage Examen','url'=>array('admin')),
);
?>

<h1>Examens</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
