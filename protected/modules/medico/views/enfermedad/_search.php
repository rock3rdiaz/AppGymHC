<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php /*echo $form->textFieldRow($model,'idEnfermedad',array('class'=>'span5'));*/ ?>
	<?php echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo CHtml::label('Tipo de enfermedad', '');?>
	<?php echo $form->dropDownList($model,'tipo',array('familiar'=>'Antecedente familiar', 'personal'=>'Antecedente personal'), array('empty'=>'-- TODOS --', 'class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
                        'icon'=>'white search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
