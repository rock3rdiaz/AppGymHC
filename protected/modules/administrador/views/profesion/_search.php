<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php /*echo $form->textFieldRow($model,'idProfesion',array('class'=>'span5'));*/ ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
                        'icon'=>'white search'
		)); ?>
	</div>

<?php $this->endWidget(); ?>