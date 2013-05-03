<?php
$this->breadcrumbs=array(
	'Administracion EPS'=>array('admin'),
	'Crear EPS',
);


/*$this->menu=array(
	array('label'=>'List EPS','url'=>array('index')),
	array('label'=>'Manage EPS','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Creaci&oacute;n de una EPS</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>