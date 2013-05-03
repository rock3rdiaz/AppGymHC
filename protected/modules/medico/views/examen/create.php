<?php
$this->breadcrumbs=array(
	'Administracion examenes'=>array('admin'),
	'Crear examen',
);

/*$this->menu=array(
	array('label'=>'List Examen','url'=>array('index')),
	array('label'=>'Manage Examen','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Creaci&oacute;n de un ex&aacute;men</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>