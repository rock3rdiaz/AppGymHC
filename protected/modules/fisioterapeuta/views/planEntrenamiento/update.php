<?php
$this->breadcrumbs=array(
	'Plan Entrenamientos'=>array('admin'),
	$model->idPlan_entrenamiento=>array('view','id'=>$model->idPlan_entrenamiento),
	'Actualizar',
);

/*$this->menu=array(
	array('label'=>'List PlanEntrenamiento','url'=>array('index')),
	array('label'=>'Create PlanEntrenamiento','url'=>array('create')),
	array('label'=>'View PlanEntrenamiento','url'=>array('view','id'=>$model->idPlan_entrenamiento)),
	array('label'=>'Manage PlanEntrenamiento','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Actualizaci&oacute;n plan de entrenamiento <?php echo $model->idPlan_entrenamiento; ?></h1>

<?php echo $this->renderPartial('_form',
							array('model'=>$model,
								'actualiza'=>'si',
								'listado_instructores'=>$listado_instructores,
								'model_trabajo_cardiovascular'=>$model_trabajo_cardiovascular,
								'model_trabajo_estiramiento'=>$model_trabajo_estiramiento,
								'model_clases_grupales'=>$model_clases_grupales)); ?>

<?php
    Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/Miscelaneaus.js',
       CClientScript::POS_END
    );
?>