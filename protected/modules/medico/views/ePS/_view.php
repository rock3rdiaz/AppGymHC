<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEPS')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEPS),array('view','id'=>$data->idEPS)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>