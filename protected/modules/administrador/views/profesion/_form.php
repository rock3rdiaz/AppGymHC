<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'profesion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios. Ingrese los datos de manera
        cuidadosa.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar datos' : 'Actualizar datos',
                        'icon'=>'white ok',
		)); ?>
            
                <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'primary',
			'label'=>'Regresar',
                        'icon'=>'white remove',
                        'url'=>array('admin'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
