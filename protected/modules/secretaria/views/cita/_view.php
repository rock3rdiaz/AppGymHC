<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCita')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCita),array('view','id'=>$data->idCita)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motivo')); ?>:</b>
	<?php echo CHtml::encode($data->motivo); ?>
	<br />


</div>