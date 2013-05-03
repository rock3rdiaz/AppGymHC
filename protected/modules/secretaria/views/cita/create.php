<?php
$this->breadcrumbs=array(
	'Administracion de citas'=>array('admin'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List Cita','url'=>array('index')),
	array('label'=>'Manage Cita','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Creaci&oacute;n de una cita</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'listado_empleados'=>$listado_empleados)); ?>

<?php
    Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/Miscelaneaus.js',
       CClientScript::POS_END
    );
?>