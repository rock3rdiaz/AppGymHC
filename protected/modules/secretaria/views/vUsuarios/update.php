<?php
$this->breadcrumbs=array(
	'Vusuarioses'=>array('index'),
	$model->id=>array('view','id'=>$model->),
	'Update',
);

$this->menu=array(
	array('label'=>'List VUsuarios','url'=>array('index')),
	array('label'=>'Create VUsuarios','url'=>array('create')),
	array('label'=>'View VUsuarios','url'=>array('view','id'=>$model->)),
	array('label'=>'Manage VUsuarios','url'=>array('admin')),
);
?>

<h1>Update VUsuarios <?php echo $model->; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>