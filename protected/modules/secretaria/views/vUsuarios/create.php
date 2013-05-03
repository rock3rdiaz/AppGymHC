<?php
$this->breadcrumbs=array(
	'Vusuarioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VUsuarios','url'=>array('index')),
	array('label'=>'Manage VUsuarios','url'=>array('admin')),
);
?>

<h1>Create VUsuarios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>