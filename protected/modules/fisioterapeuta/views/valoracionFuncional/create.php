<?php
$this->breadcrumbs=array(
	'Valoracion funcional'=>array('create'),
	'Nueva valoracion funcional',
);
?>

<h1 class="h1_titulos_acciones">Formato valoraci&oacute;n funcional</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,
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