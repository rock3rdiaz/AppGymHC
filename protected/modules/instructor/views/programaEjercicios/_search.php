<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php //echo $form->textFieldRow($model,'idPrograma_ejercicios',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'fecha_realizacion',array('class'=>'span5')); ?>

	<?php echo $form->labelEx($model, 'fecha_realizacion', array('label'=>'Fecha de realizacion'));
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                //'name'=>'fecha_realizacion',
                'model'=>$model,
                'attribute'=>'fecha_realizacion',
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

	<?php //echo $form->textFieldRow($model,'observaciones',array('class'=>'span5','maxlength'=>100)); ?>

	<?php //echo $form->textFieldRow($model,'idPlan_entrenamiento',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
            'icon'=>'white search'
		)); ?>
	</div>

<?php $this->endWidget(); ?>
