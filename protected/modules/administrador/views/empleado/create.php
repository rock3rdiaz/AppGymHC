<?php
$this->breadcrumbs=array(
	'Empleados'=>array('admin'),
	'Crear empleado',
);

/*$this->menu=array(
	array('label'=>'List Empleado','url'=>array('index')),
	array('label'=>'Manage Empleado','url'=>array('admin')),
);*/

?>

<h1 class="h1_titulos_acciones">Creaci&oacute;n de un empleado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>