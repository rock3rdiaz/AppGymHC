<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'ejercicio-form',
	'enableAjaxValidation'=>false,
   	'enableClientValidation'=>true,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'seccion_trabajo',array('class'=>'span5','maxlength'=>35)); ?>
	<?php 
		$listado_seccion_trabajo = ['cadera'=>'Cadera', 'muslo_gluteo'=>'Muslo gluteo', 'pantorrilla'=>'Pantorrilla',
									'espalda'=>'Espalda', 'pecho'=>'Pecho', 'hombro'=>'Hombro', 'brazo_anterior'=>'Brazo anterior',
									'brazo_posterior'=>'Brazo posterior', 'antebrazo'=>'Antebrazo', 'abdominales'=>'Abdominales',
									'centro'=>'Centro'];
		echo $form->dropDownListRow($model, 'seccion_trabajo', $listado_seccion_trabajo, array('class'=>'span5'));
	?>

	<?php echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>100)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'white ok',
			'label'=>$model->isNewRecord ? 'Guardar datos' : 'Actualizar datos',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
