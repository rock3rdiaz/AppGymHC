<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_usuarios',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'identificacion',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'tipo_identificacion',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'primer_nombre',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'segundo_nombre',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'primer_apellido',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'segundo_apellido',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'sexo',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'fecha_nac',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_ingreso',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'direccion',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'celular',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'mail',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'tipo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'categoria',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'estado',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tipo_ingreso',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_grupo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_profesion',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
