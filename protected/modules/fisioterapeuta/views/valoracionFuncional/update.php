<?php
$this->breadcrumbs=array(
	'Valoracion Funcional'=>array('admin'),
	$model->idValoracion_funcional=>array('view','id'=>$model->idValoracion_funcional),
	'Actualizar',
);

/*$this->menu=array(
	array('label'=>'List ValoracionFuncional','url'=>array('index')),
	array('label'=>'Create ValoracionFuncional','url'=>array('create')),
	array('label'=>'View ValoracionFuncional','url'=>array('view','id'=>$model->idValoracion_funcional)),
	array('label'=>'Manage ValoracionFuncional','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Actualizaci&oacute;n Valoracion funcional <?php echo $model->idValoracion_funcional; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,
					'actualizar'=>$actualizar,					
                    'model_medidas_antropometricas'=>$model_medidas_antropometricas,
                    'model_frecuencia_entrenamiento'=>$model_frecuencia_entrenamiento,
                    'model_perimetro'=>$model_perimetro,
                    'model_pliegue'=>$model_pliegue,
                    'model_test_funcional'=>$model_test_funcional,
                    'model_antecedentes_usuario'=>$model_antecedentes_usuario)); ?>

<?php
    Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/Miscelaneaus.js',
	   CClientScript::POS_END
	);
?>

