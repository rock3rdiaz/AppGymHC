<?php
$this->breadcrumbs=array(
	'Citas'=>array('admin'),
	$model->idCita=>array('view','id'=>$model->idCita),
	'Actualizar cita',
);

/*$this->menu=array(
	array('label'=>'List Cita','url'=>array('index')),
	array('label'=>'Create Cita','url'=>array('create')),
	array('label'=>'View Cita','url'=>array('view','id'=>$model->idCita)),
	array('label'=>'Manage Cita','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Actualizaci&oacute;n datos de la cita No. <?php echo $model->idCita; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'listado_empleados'=>$listado_empleados)); ?>

<?php
    Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/Miscelaneaus.js',
       CClientScript::POS_END
    );
?>