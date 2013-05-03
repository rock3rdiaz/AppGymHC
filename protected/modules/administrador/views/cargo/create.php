<?php
$this->breadcrumbs=array(
	'Cargos'=>array('admin'),
	'Crear cargo',
);

/*$this->menu=array(
	array('label'=>'List Cargo','url'=>array('index')),
	array('label'=>'Manage Cargo','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Creaci&oacute;n de un cargo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>