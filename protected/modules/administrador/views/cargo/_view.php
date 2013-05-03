<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCargo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCargo),array('view','id'=>$data->idCargo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>