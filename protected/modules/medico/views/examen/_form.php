<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'examen-form',
	'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
)); ?>
    
	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

     <?php 
        /*Generamos el listado de los usuarios que el dia actual han sido examinados por el medico. Esto con el objeto de
        * permitir asociarles a los mismos algun examen, si este fuera necesario.
        */
        $listado_id_usuarios = Cita::model()->getCitasDeHoy('medica', 'efectuada');      
        $listado_nombre_usuarios = array();

        foreach ($listado_id_usuarios as $id){
            $id_historia_gym = HistoriaGYM::model()->findByAttributes(array('idVUsuario'=>$id['idVUsuario']))->idHistoria_GYM;//Obtengo el id de la historia clinica dado el codigo del usuario
            $id_evaluacion_medica = EvaluacionMedica::model()->findByAttributes(array('idHistoria_GYM'=>$id_historia_gym))->idEvaluacion_medica;//Obtengo el id de la evaluacion medica del usuario, dado el codigo de su historia clinica

            $listado_nombre_usuarios[$id_evaluacion_medica] = VUsuarios::model()->getNombreCompleto($id['idVUsuario']);
        }

        echo $form->dropDownListRow($model, 'idEvaluacion_medica', $listado_nombre_usuarios, array('class'=>'span5'));
     ?>

    <?php echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>100)); ?>
    <?php echo $form->textFieldRow($model,'resultado',array('class'=>'span5','maxlength'=>100)); ?>     

	<?php //echo $form->textFieldRow($model,'fecha_realizacion',array('class'=>'span5')); ?>
        
        <?php 
            echo $form->labelEx($model, 'fecha_realizacion', array('label'=>'Fecha de realizacion'));
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
                    'style'=>'height:20px;'
                ),
            ));
        ?>    
        <?php echo $form->error($model,'fecha_realizacion'); ?>
        
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
