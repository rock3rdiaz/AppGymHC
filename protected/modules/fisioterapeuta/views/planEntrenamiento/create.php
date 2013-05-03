<?php
$this->breadcrumbs=array(
	'Plan de Entrenamiento'=>array('admin'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List PlanEntrenamiento','url'=>array('index')),
	array('label'=>'Manage PlanEntrenamiento','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Creaci&oacute;n de un plan de entrenamiento</h1>

<?php echo $this->renderPartial('_form', 
			array('model'=>$model,	
				'listado_instructores'=>$listado_instructores,
				'model_trabajo_cardiovascular'=>$model_trabajo_cardiovascular,
				'model_trabajo_estiramiento'=>$model_trabajo_estiramiento,
				'model_clases_grupales'=>$model_clases_grupales)); 
?>

<?php
    Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/Miscelaneaus.js',
       CClientScript::POS_END
    );
?>