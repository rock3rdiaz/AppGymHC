<?php
$this->breadcrumbs=array(
	'Eps'=>array('index'),
	$model->idEPS=>array('view','id'=>$model->idEPS),
	'Update',
);

$this->menu=array(
	array('label'=>'List EPS','url'=>array('index')),
	array('label'=>'Create EPS','url'=>array('create')),
	array('label'=>'View EPS','url'=>array('view','id'=>$model->idEPS)),
	array('label'=>'Manage EPS','url'=>array('admin')),
);
?>

<h1>Update EPS <?php echo $model->idEPS; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>