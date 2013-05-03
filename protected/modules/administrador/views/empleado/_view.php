<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEmpleado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEmpleado),array('view','id'=>$data->idEmpleado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombres')); ?>:</b>
	<?php echo CHtml::encode($data->nombres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellidos')); ?>:</b>
	<?php echo CHtml::encode($data->apellidos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCargo')); ?>:</b>
	<?php echo CHtml::encode($data->idCargo); ?>
	<br />


</div>