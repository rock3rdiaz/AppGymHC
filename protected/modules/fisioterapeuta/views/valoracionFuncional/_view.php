<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idValoracion_funcional')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idValoracion_funcional),array('view','id'=>$data->idValoracion_funcional)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objetivo_ejercicio')); ?>:</b>
	<?php echo CHtml::encode($data->objetivo_ejercicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_hora')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_hora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('programa_entrenamiento')); ?>:</b>
	<?php echo CHtml::encode($data->programa_entrenamiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idHistoria_GYM')); ?>:</b>
	<?php echo CHtml::encode($data->idHistoria_GYM); ?>
	<br />


</div>