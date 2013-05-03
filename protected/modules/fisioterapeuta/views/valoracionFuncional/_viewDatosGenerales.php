<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
    
    <?php echo $form->errorSummary($model); ?>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span10">
                        <?php echo CHtml::label('Nombres y apellidos del usuario', '');?>
                        <?php echo CHtml::textField('txt_nombres_usuario_vf', '', array('class'=>'span12'));?>
                    </div>
                    
                    <div class="span2">
                    	<?php echo CHtml::label('Id Usuario', '');?>
                        <?php echo CHtml::textField('txt_id_usuario_vf', '', array('class'=>'span12'));?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span6">
                        <?php echo CHtml::label('Fecha de nacimiento', '');?>
                        <?php echo CHtml::textField('txt_fecha_nacimiento_usuario_vf', '');?>
                    </div>
                    
                    <div class="span6"> 
                        <?php echo CHtml::label('Edad', '');?>
                        <?php echo CHtml::textField('txt_edad_usuario_vf', '');?>
                    </div>           
                </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span6">
                        <?php echo $form->labelEx($model, 'objetivo_ejercicio', 
                                    array('label'=>'Objetivo del ejercicio')); ?>
                            <?php echo $form->textField($model,'objetivo_ejercicio');?>
                            <?php echo $form->error($model,'objetivo_ejercicio'); ?>
                    </div>
                    <div class="span6">
                         <?php echo $form->labelEx($model,'programa_entrenamiento', 
                                    array('label'=>'Programa de entrenamiento')); ?>
                            <?php echo $form->dropDownList($model, 'programa_entrenamiento',
                                    array('acondicionamiento fisico'=>'Acondicionamiento fisico',
                                        'mejoramiento fisico'=>'Mejoramiento fisico',
                                        'mantenimietno fisico'=>'Mantenimiento fisico'));?>
                            <?php echo $form->error($model,'programa_entrenamiento'); ?>
                    </div>
                    
                </div>
            </div>
        </div>