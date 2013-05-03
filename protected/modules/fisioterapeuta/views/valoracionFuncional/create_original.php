<?php
$this->breadcrumbs=array(
	'Valoracion Funcionals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ValoracionFuncional','url'=>array('index')),
	array('label'=>'Manage ValoracionFuncional','url'=>array('admin')),
);
?>

<h1>Create ValoracionFuncional</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>