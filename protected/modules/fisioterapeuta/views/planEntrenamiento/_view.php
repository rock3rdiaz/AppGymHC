<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPlan_entrenamiento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPlan_entrenamiento),array('view','id'=>$data->idPlan_entrenamiento)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objetivo')); ?>:</b>
	<?php echo CHtml::encode($data->objetivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_trabajo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_trabajo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saludable')); ?>:</b>
	<?php echo CHtml::encode($data->saludable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recomendaciones')); ?>:</b>
	<?php echo CHtml::encode($data->recomendaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idValoracion_funcional')); ?>:</b>
	<?php echo CHtml::encode($data->idValoracion_funcional); ?>
	<br />


</div>