<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idDeporte')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idDeporte),array('view','id'=>$data->idDeporte)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>