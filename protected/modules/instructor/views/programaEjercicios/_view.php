<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPrograma_ejercicios')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPrograma_ejercicios),array('view','id'=>$data->idPrograma_ejercicios)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_realizacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_realizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPlan_entrenamiento')); ?>:</b>
	<?php echo CHtml::encode($data->idPlan_entrenamiento); ?>
	<br />


</div>