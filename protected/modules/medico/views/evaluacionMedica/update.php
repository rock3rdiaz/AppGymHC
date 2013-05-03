<?php
/* @var $this EvaluacionMedicaController */
/* @var $model EvaluacionMedica */

$this->breadcrumbs=array(
	'Evaluacion Medicas'=>array('admin'),
	$model->idEvaluacion_medica=>array('view','id'=>$model->idEvaluacion_medica),
	'Actualizar evaluacion medica',
);

/*$this->menu=array(
	array('label'=>'List EvaluacionMedica', 'url'=>array('index')),
	array('label'=>'Create EvaluacionMedica', 'url'=>array('create')),
	array('label'=>'View EvaluacionMedica', 'url'=>array('view', 'id'=>$model->idEvaluacion_medica)),
	array('label'=>'Manage EvaluacionMedica', 'url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Actualizacion ex&aacute;men m&eacute;dico No. <?php echo $model->idEvaluacion_medica; ?></h1>


<?php echo $this->renderPartial('_form', array('model'=>$model,	
                    'actualizar'=>'si',
                    'model_antecedentes_deportivos'=>$model_antecedentes_deportivos,		     		
                    'model_antecedentes_ginecobstetricos'=>$model_antecedentes_ginecobstetricos,                    
                    'model_impresion_diagnostica'=>$model_impresion_diagnostica,
                    //'model_impresion_diagnostica_examen'=>$model_impresion_diagnostica_examen,Tabla puente
                    //'model_examen'=>$model_examen,	                    
                    'model_examen_fisico'=>$model_examen_fisico,
                    'model_caracteristicas_fisicas'=>$model_caracteristicas_fisicas,
                    'model_medidas_fisicas'=>$model_medidas_fisicas,                    
                    'model_antecedentes_trauma_lesion'=>$model_antecedentes_trauma_lesion,                    
                    'model_antecedentes_patologicos'=>$model_antecedentes_patologicos,                    
                    //'model_antecedentes_patologicos_enfermedad'=>$model_antecedentes_patologicos_enfermedad,
                    //'model_enfermedad'=>$model_enfermedad,  
                    'model_datos_extra_usuario'=>$model_datos_extra_usuario));?>


<?php
    Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/Miscelaneaus.js',
       CClientScript::POS_END
    );
?>
