<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEjercicio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEjercicio),array('view','id'=>$data->idEjercicio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seccion_trabajo')); ?>:</b>
	<?php echo CHtml::encode($data->seccion_trabajo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->decripcion); ?>
	<br />


</div>