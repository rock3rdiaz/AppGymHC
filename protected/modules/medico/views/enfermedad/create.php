<?php
$this->breadcrumbs=array(
	'Administracion enfermedades'=>array('admin'),
	'Crear enfermedad',
);

/*$this->menu=array(
	array('label'=>'List Enfermedad','url'=>array('index')),
	array('label'=>'Manage Enfermedad','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Creaci&oacute;n de una enfermedad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>