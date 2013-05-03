<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'deporte-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'focus'=>array($model,'nombre'),
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
                        'icon'=>'white ok',
			'label'=>$model->isNewRecord ? 'Guardar datos' : 'Actuaizar datos',
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
