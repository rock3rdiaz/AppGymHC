<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php //echo $form->textFieldRow($model,'idEjercicio',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'seccion_trabajo',array('class'=>'span5','maxlength'=>35)); ?>

	<?php echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>100)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
			'icon'=>'white search'
		)); ?>
	</div>

<?php $this->endWidget(); ?>
