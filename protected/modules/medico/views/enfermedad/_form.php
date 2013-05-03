<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'enfermedad-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'descripcion'),
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>65)); ?>

	<?php echo $form->dropDownListRow($model, 'tipo', array('personal'=>'Antecedente personal', 'familiar'=>'Antecedente familiar'));?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar datos' : 'Actualizar datos',
                        'icon'=>'white ok',
		)); ?>
            
                <?php  
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'label'=>'Regresar',
                        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        'size'=>'', // '', 'large', 'small' or 'mini'
                        'url'=>array('admin'),
                        'icon'=>'white remove',
                )); ?>
	</div>

<?php $this->endWidget(); ?>
