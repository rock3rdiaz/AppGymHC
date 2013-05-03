<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEnfermedad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEnfermedad),array('view','id'=>$data->idEnfermedad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>