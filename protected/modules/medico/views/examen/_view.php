<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idExamen')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idExamen),array('view','id'=>$data->idExamen)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resultado')); ?>:</b>
	<?php echo CHtml::encode($data->resultado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_realizacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_realizacion); ?>
	<br />


</div>