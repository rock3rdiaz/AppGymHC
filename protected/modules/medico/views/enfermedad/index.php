<?php
$this->breadcrumbs=array(
	'Enfermedads',
);

$this->menu=array(
	array('label'=>'Create Enfermedad','url'=>array('create')),
	array('label'=>'Manage Enfermedad','url'=>array('admin')),
);
?>

<h1>Enfermedads</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
