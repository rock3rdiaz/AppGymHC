<?php
/* @var $this EvaluacionMedicaController */
/* @var $model EvaluacionMedica */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEvaluacion_medica')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEvaluacion_medica), array('view', 'id'=>$data->idEvaluacion_medica)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enfermedad_actual')); ?>:</b>
	<?php echo CHtml::encode($data->enfermedad_actual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_hora')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_hora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motivo_consulta')); ?>:</b>
	<?php echo CHtml::encode($data->motivo_consulta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idHistoria_GYM')); ?>:</b>
	<?php echo CHtml::encode($data->idHistoria_GYM); ?>
	<br />


</div>