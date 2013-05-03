<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php //echo $form->textFieldRow($model,'idPlan_entrenamiento',array('class'=>'span5')); ?>

	<?php 
            echo $form->labelEx($model, 'fecha_creacion', array('label'=>'Fecha de creacion'));
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                //'name'=>'fecha_realizacion',
                'model'=>$model,
                'attribute'=>'fecha_creacion',
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

	<?php echo $form->dropDownListRow($model, 'objetivo', array('fuerza resistencia'=>'Fuerza resistencia', 'resistencia a la fuerza'=>'Resistencia a la fuerza', 'hipertrofia'=>'Hipertrofia'), 
														array('empty'=>'-- Seleccione una opcion --', 'class'=>'span5'));?>

	<?php echo $form->dropDownListRow($model, 'tipo_trabajo', array('bloque'=>'Trabajo en bloque', 'circuito'=>'Trabajo en circuito', 'ambos'=>'Ambos'), 
														array('empty'=>'-- Seleccione una opcion --', 'class'=>'span5'));?>	

	<?php echo $form->textFieldRow($model,'saludable',array('class'=>'span5','maxlength'=>60)); ?>

	<?php //echo $form->textFieldRow($model,'recomendaciones',array('class'=>'span5','maxlength'=>100)); ?>

	<?php //echo $form->textFieldRow($model,'idValoracion_funcional',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
			'icon'=>'white search'
		)); ?>
	</div>

<?php $this->endWidget(); ?>
