<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
    
    <?php echo $form->errorSummary($model_antecedentes_usuario); ?>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span6">
                        <?php echo CHtml::label('Factor de riesgo cardiovascular', '');?>
                        <?php echo CHtml::textField('txt_factor_cardiovascular_vf');?>
                    </div>
                    <div class="span6">
                        <?php echo CHtml::label('Factor de riesgo musculoesqueletico', '');?>
                        <?php echo CHtml::textField('txt_factor_musculoesqueletico_vf', '', array('class'=>'span10'));?>
                    </div>  
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                   <div class="span12">
                        <?php echo CHtml::label('Conducta', '');?>
                        <?php echo CHtml::textField('txt_conducta_vf', '', array('class'=>'span12'));?>
                    </div> 
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                   <div class="span12">
                        <?php echo CHtml::label('Recomendaciones nutricionales', '');?>
                        <?php echo CHtml::textField('txt_recomendaciones_nuctricionales_vf', '', array('class'=>'span12'));?>
                    </div> 
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                   <div class="span12">
                        <?php echo CHtml::label('Observaciones', '');?>
                        <?php echo CHtml::textField('txt_observaciones_vf', '', array('class'=>'span12'));?>
                    </div> 
                </div>
            </div>
        </div>        

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span4">
                        <?php echo CHtml::label('Tipo actividad fisica', '');?>
                        <?php echo CHtml::textField('txt_tipo_actividad_fisica_vf');?>
                    </div> 
                     <div class="span8">
                        <?php echo CHtml::label('Justificacion actividad fisica', '');?>
                        <?php echo CHtml::textField('txt_justificacion_actividad_fisica_vf', '', array('class'=>'span12'));?>
                    </div>                     
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span6">
                        <?php echo $form->labelEx($model_antecedentes_usuario, 'postura', 
                                    array('label'=>'Postura')); ?>
                        <?php echo $form->textField($model_antecedentes_usuario, 'postura');?>
                        <?php echo $form->error($model_antecedentes_usuario,'postura'); ?>                       
                    </div>
                    <div class="span6">
                            <?php echo $form->labelEx($model_antecedentes_usuario, 'estabilidad_core', 
                                    array('label'=>'Estabilidad C.O.R.E')); ?>
                            <?php echo $form->dropDownList($model_antecedentes_usuario, 'estabilidad_core',
                                    array('bajo'=>'Baja', 'regular'=>'Regular', 'buena'=>'Buena', 'excelente'=>'Excelente'));?>
                            <?php echo $form->error($model_antecedentes_usuario,'estabilidad_core'); ?>
                    </div>                    
                </div>
            </div>
        </div>
