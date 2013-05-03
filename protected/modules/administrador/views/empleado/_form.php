<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'empleado-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios. Ingrese los datos de manera
        cuidadosa.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nombres',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'apellidos',array('class'=>'span5','maxlength'=>45)); ?>
        
        <?php /*echo $form->textFieldRow($model,'idCargo',array('class'=>'span5'));*/
            $datos_profesiones =CHtml::listData(Profesion::model()->findAll(array('order'=>'nombre ASC')), 'idProfesion', 'nombre');
            echo $form->labelEx($model, 'Profesi&oacute;n');
            echo $form->DropDownList/*Row*/($model, 'Profesion_idProfesion', $datos_profesiones, 
                    array('empty'=>'--Seleccione una profesion--', 'class'=>'span5'));            
        ?>

	<?php /*echo $form->textFieldRow($model,'idCargo',array('class'=>'span5'));*/
            $datos_cargos =CHtml::listData(Cargo::model()->findAll(array('order'=>'nombre ASC')), 'idCargo', 'nombre');
            echo $form->labelEx($model, 'Cargo');
            echo $form->DropDownList/*Row*/($model, 'idCargo', $datos_cargos, 
                    array('empty'=>'--Seleccione un cargo--', 'class'=>'span5'));
    ?>

        <?php echo $form->textFieldRow($model,'login',array('class'=>'span5','maxlength'=>45)); ?>
        <?php echo $form->passwordFieldRow($model,'pass',array('class'=>'span5','maxlength'=>45)); ?>

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
