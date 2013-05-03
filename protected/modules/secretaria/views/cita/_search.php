<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php //echo $form->textFieldRow($model,'idCita',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model, 'tipo',array('medica'=>'Examen medico', 'funcional'=>'Valoracion funcional'), 
							array('empty'=>'-- Seleccione ua opcion --', 'class'=>'span5','maxlength'=>20)); ?>

    <?php echo $form->dropDownListRow($model, 'estado',array('cancelada'=>'Canceladas', 'efectuada'=>'Efectuadas', 'pendiente'=>'Pendientes'), 
                            array('empty'=>'-- Seleccione ua opcion --', 'class'=>'span5','maxlength'=>20)); ?>

	<?php 
            echo $form->labelEx($model, 'fecha', array('label'=>'Fecha'));
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                //'name'=>'fecha_realizacion',
                'model'=>$model,
                'attribute'=>'fecha',
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

	<?php echo $form->dropDownListRow($model, 'motivo', array('control'=>'Control', 'lesion'=>'Lesion', 'ingreso'=>'Ingreso'), 
							array('empty'=>'-- Seleccione ua opcion --', 'class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
                        'icon'=>'white search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
