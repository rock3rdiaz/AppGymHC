<?php
$this->breadcrumbs=array(
	'Administracion deportes'=>array('admin'),
	'Crear deporte',
);

/*$this->menu=array(
	array('label'=>'List Deporte','url'=>array('index')),
	array('label'=>'Manage Deporte','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Creaci&oacute;n de un deporte</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>