<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php //echo $form->textFieldRow($model,'idValoracion_funcional',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'objetivo_ejercicio',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'observaciones',array('class'=>'span5','maxlength'=>65)); ?>

	<?php 
            echo $form->labelEx($model, 'fecha_realizacion', array('label'=>'Fecha de realizacion'));
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                //'name'=>'fecha_realizacion',
                'model'=>$model,
                'attribute'=>'fecha_hora',
                'language'=>'es',
                // additional javascript options for the date picker plugin
                'options'=>array(
                    'showAnim'=>'fold',
                    'dateFormat'=>'yy-mm-dd',
                    'changeMonth'=>'true',
                    'changeYear'=>'true',
                    'showButtonPanel'=>true,
                ),
                'htmlOptions'=>array(
                    'style'=>'height:20px;',
                    'class'=>'span5'
                ),
            ));
    ?>

	<?php echo $form->labelEx($model,'programa_entrenamiento', array('label'=>'Programa de entrenamiento')); ?>
    <?php echo $form->dropDownList($model, 'programa_entrenamiento',
                                    array('acondicionamiento fisico'=>'Acondicionamiento fisico',
                                        'mejoramiento fisico'=>'Mejoramiento fisico',
                                        'mantenimietno fisico'=>'Mantenimiento fisico'), array('empty'=>'-- TODOS --', 'class'=>'span5'));?>

	<?php //echo $form->textFieldRow($model,'idHistoria_GYM',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
			'icon'=>'white search'
		)); ?>
	</div>

<?php $this->endWidget(); ?>
