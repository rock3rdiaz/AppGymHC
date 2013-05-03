<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php //echo $form->textFieldRow($model,'idEvaluacion_medica',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'enfermedad_actual',array('class'=>'span5','maxlength'=>45)); ?>

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
                    'style'=>'height:20px;'
                ),
            ));
    ?>  

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
