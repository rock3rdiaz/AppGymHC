<?php
$this->breadcrumbs=array(
	'Valoracion Funcionals',
);

$this->menu=array(
	array('label'=>'Create ValoracionFuncional','url'=>array('create')),
	array('label'=>'Manage ValoracionFuncional','url'=>array('admin')),
);
?>

<h1>Valoracion Funcionals</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
