<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idProfesion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idProfesion),array('view','id'=>$data->idProfesion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>