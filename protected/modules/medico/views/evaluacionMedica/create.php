<?php
$this->breadcrumbs=array(
	'Evaluacion medico'=>array('admin'),
	'Nuevo examen medico',
);
?>

<h1 class="h1_titulos_acciones">Formato ex&aacute;men m&eacute;dico</h1>

<?php $this->renderPartial('_form', array('model'=>$model,
                    'model_antecedentes_deportivos'=>$model_antecedentes_deportivos,
                    'model_antecedentes_ginecobstetricos'=>$model_antecedentes_ginecobstetricos,
                    
                    'model_impresion_diagnostica'=>$model_impresion_diagnostica,
                    //'model_impresion_diagnostica_examen'=>$model_impresion_diagnostica_examen,
                    //'model_examen'=>$model_examen,
                    
                    'model_examen_fisico'=>$model_examen_fisico,
                    'model_caracteristicas_fisicas'=>$model_caracteristicas_fisicas,
                    'model_medidas_fisicas'=>$model_medidas_fisicas,
                    
                    'model_antecedentes_trauma_lesion'=>$model_antecedentes_trauma_lesion,
		
					'model_antecedentes_patologicos'=>$model_antecedentes_patologicos,					
					//'model_antecedentes_patologicos_enfermedad'=>$model_antecedentes_patologicos_enfermedad,
					//'model_enfermedad'=>$model_enfermedad,

                    'model_datos_extra_usuario'=>$model_datos_extra_usuario
                    ));
?>

<?php
    Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/Miscelaneaus.js',
       CClientScript::POS_END
    );
?>
