<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cita-form',
	'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                <div class="span4">
                    <?php echo CHtml::label('Identificacion del usuario', 'cedula_usuario_cita');        
                        /*$lista_usuarios = CHtml::listData(VUsuarios::model()->findAll(), 'id_usuarios', 'identificacion');
                        echo $form->dropDownList($model, 'idVUsuario', $lista_usuarios);*/
                        echo CHtml::textField('cedula_usuario_cita', '', array('class'=>'span12'));
                    ?>
                </div>

                <div class="span1">
                    <?php echo CHtml::label('', 'btn_buscar_usuario', array('class'=>'span12'));?>
                    <a id="btn_buscar_usuario" class="btn btn-info" href="#"><i class="icon-white icon-search"></i></a>        
                </div>
                            
                <div class="span4">                   
                </div>
            </div>
        </div>
    </div>

    <?php echo $form->textFieldRow($model, 'idVUsuario', array('disabled'=>true));?>
        
	<?php echo $form->dropDownListRow($model,'tipo',
                array('medica'=>'Examen medico', 'funcional'=>'Valoracion funcional'));?>

	<?php 
            echo $form->labelEx($model, 'fecha', array('label'=>'Fecha y hora'));
            Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker', array(
                //'name'=>'publishDate',
                'mode'=>'datetime',
                'model'=>$model,
                'attribute'=>'fecha',
                'language'=>'es',
                // additional javascript options for the date picker plugin
                'options'=>array(
                    'showAnim'=>'fold',
                    'dateFormat'=>'yy-mm-dd',
                    'timeFormat'=>'hh:mm:ss',
                    'changeYear'=>true,
                    'changeMonth'=>true,
                    'showButtonPanel'=>true,
                ),
                'htmlOptions'=>array(
                    'style'=>'height:20px;'
                ),
            ));
    ?>
        <?php echo $form->error($model,'fecha'); ?>

	<?php echo $form->dropDownListRow($model,'motivo',
                array('ingreso'=>'Ingreso', 'control'=>'Control', 'lesion'=>'Lesion')); ?>
                
    <?php 
        echo $form->labelEx($model, 'Empleado_idEmpleado', array('label'=>'Nombre del prestador del servicio'));  
        echo $form->dropDownList($model, 'Empleado_idEmpleado', $listado_empleados, array('empty'=>'----'));
        //echo $form->textField($model, 'Empleado_idEmpleado');
    ?>
        
        <?php 
        	echo $form->dropDownListRow($model, 'estado', array('pendiente'=>'Pendiente', 'cancelada'=>'Cancelada'));
        ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'button',
			'type'=>'primary',
            'icon'=>'white ok',
			'label'=>$model->isNewRecord ? 'Guardar datos' : 'Actualizar datos', 
            'htmlOptions'=>array('id'=>'btn_guardar_cita')           
		)); ?>
            
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'label'=>'Regresar',
            'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size'=>'', // '', 'large', 'small' or 'mini'
            'url'=>array('admin'),
            'icon'=>'white remove',
        )); ?>
	</div>

<?php $this->endWidget(); ?>
