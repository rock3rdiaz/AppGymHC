<?php
$this->breadcrumbs=array(
	'Vusuarioses',
);

$this->menu=array(
	array('label'=>'Create VUsuarios','url'=>array('create')),
	array('label'=>'Manage VUsuarios','url'=>array('admin')),
);
?>

<h1>Vusuarioses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
