<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php /*echo $form->textFieldRow($model,'idEmpleado',array('class'=>'span5'));*/ ?>

	<?php echo $form->textFieldRow($model,'nombres',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'apellidos',array('class'=>'span5','maxlength'=>45)); ?>

	<?php /*echo $form->textFieldRow($model,'idCargo',array('class'=>'span5'));*/
            echo $form->labelEx($model, 'Cargo');
            $datos = CHtml::listData(Cargo::model()->findAll(), 'idCargo', 'nombre');
            echo $form->DropDownList/*Row*/($model, 'idCargo', $datos, array('empty'=>'--Seleccione un cargo--', 'class'=>'span5'));
        ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
                        'icon'=>'white search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
