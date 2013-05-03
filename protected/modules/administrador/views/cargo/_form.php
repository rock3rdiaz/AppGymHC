<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cargo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios. Ingrese los datos de manera
        cuidadosa.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow($model,'nombre',
			array('administrador'=>'Administrador', 'medico general'=>'Medico general', 'fisioterapeuta'=>'Fisioterapeuta', 'instructor'=>'Instructor',
					'secretaria'=>'Secretaria'),
			array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar datos' : 'Actualizar datos',
                        'icon'=>'white ok',
                        'url'=>array('cargo/admin'),
		)); ?>
            
                <?php $this->widget('bootstrap.widgets.TbButton', array(
						'type'=>'primary',
						'label'=>'Regresar',
                        'icon'=>'white remove',
                        'url'=>array('admin'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
