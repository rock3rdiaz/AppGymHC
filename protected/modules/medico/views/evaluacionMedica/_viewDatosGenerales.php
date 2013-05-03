<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
    
    <?php echo $form->errorSummary(array($model, $model_datos_extra_usuario)); ?>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span10">
                        <?php echo CHtml::label('Nombres y apellidos del usuario', '');?>
                        <?php echo CHtml::textField('txt_nombres_usuario_em', '', array('class'=>'span12'));?>
                    </div>
                    
                    <div class="span2">
                    	<?php echo CHtml::label('Id Usuario', '');?>
                        <?php echo CHtml::textField('txt_id_usuario_em', '', array('class'=>'span12'));?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span4">
                        <?php echo CHtml::label('Fecha de nacimiento', '');?>
                        <?php echo CHtml::textField('txt_fecha_nacimiento_usuario_em', '');?>
                    </div>
                    
                    <div class="span4"> 
                        <?php echo $form->labelEx($model_datos_extra_usuario, 'lugar_nacimiento')?>
                        <?php echo $form->textField($model_datos_extra_usuario, 'lugar_nacimiento')?>
                        <?php echo $form->error($model_datos_extra_usuario, 'lugar_nacimiento'); ?>
                    </div>
                    
                    <div class="span4"> 
                        <?php echo CHtml::label('Direccion de residencia', '');?>
                        <?php echo CHtml::textField('txt_direccion_residencia_usuario_em', '');?>
                    </div>                    
                </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span4">
                       <?php echo CHtml::label('Sexo', '');?>
                       <?php echo CHtml::textField('txt_sexo_em', '');?>
                    </div>
                    
                    <div class="span4">
                        <?php echo CHtml::label('Edad', '');?>
                        <?php echo CHtml::textField('txt_edad_usuario_em', '');?>                        
                    </div>

                    <div class="span4"> 
                        <?php echo $form->labelEx($model_datos_extra_usuario, 'ocupacion')?>
                        <?php echo $form->textField($model_datos_extra_usuario, 'ocupacion')?>
                        <?php echo $form->error($model_datos_extra_usuario, 'ocupacion'); ?>
                    </div>                     
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span4">
                       <?php echo CHtml::label('Telefono', '');?>
                       <?php echo CHtml::textField('txt_telefono_usuario_em', '');?>
                    </div>
                    
                    <div class="span4">
                        <?php echo $form->labelEx($model_datos_extra_usuario, 'estado_civil')?>
                        <?php echo $form->textField($model_datos_extra_usuario, 'estado_civil')?>
                        <?php echo $form->error($model_datos_extra_usuario, 'estado_civil'); ?>               
                    </div>

                    <div class="span4"> 
                        
                    </div>                     
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span4">
                        <?php echo $form->labelEx($model_datos_extra_usuario, 'idEPS')?>
                        <?php $listado_eps = CHtml::listData(EPS::model()->findAll(array('order'=>'nombre asc')), 'idEPS', 'nombre');?>
                        <?php echo $form->dropDownList($model_datos_extra_usuario, 'idEPS', $listado_eps, array('empty'=>'-- Seleccione una EPS --'));?>
                        <?php echo $form->error($model_datos_extra_usuario, 'idEPS'); ?>
                    </div>
                    
                    <div class="span4">
                        <?php echo $form->labelEx($model_datos_extra_usuario, 'tipo_aporte')?>
                        <?php echo $form->dropDownList($model_datos_extra_usuario, 'tipo_aporte', array('beneficiario'=>'Beneficiario', 'cotizante'=>'Cotizante'),
                            array('empty'=>'-- Seleccione una opcion --'));?>
                        <?php echo $form->error($model_datos_extra_usuario, 'tipo_aporte'); ?>               
                    </div>

                    <div class="span4"> 
                        
                    </div>                     
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span4">
                       <?php echo $form->labelEx($model_datos_extra_usuario, 'acompaniante')?>
                        <?php echo $form->textField($model_datos_extra_usuario, 'acompaniante')?>
                        <?php echo $form->error($model_datos_extra_usuario, 'acompaniante'); ?>        
                    </div>
                    
                    <div class="span4">
                        <?php echo $form->labelEx($model_datos_extra_usuario, 'parentezco_acompaniante')?>
                        <?php echo $form->textField($model_datos_extra_usuario, 'parentezco_acompaniante')?>
                        <?php echo $form->error($model_datos_extra_usuario, 'parentezco_acompaniante'); ?>               
                    </div>

                    <div class="span4"> 
                        <?php echo $form->labelEx($model, 'enfermedad_actual')?>
                        <?php echo $form->textField($model, 'enfermedad_actual')?>
                        <?php echo $form->error($model, 'enfermedad_actual'); ?>
                    </div>                     
                </div>
            </div>
        </div>