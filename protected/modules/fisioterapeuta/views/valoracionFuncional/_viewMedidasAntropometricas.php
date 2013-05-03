<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
    
    <?php echo $form->errorSummary($model_medidas_antropometricas); ?>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span3">
                            <?php echo $form->labelEx($model_medidas_antropometricas,'frecuencia_cardiaca_reposo', 
                                    array('label'=>'F.C reposo')); ?>
                            <?php echo $form->textField($model_medidas_antropometricas,'frecuencia_cardiaca_reposo',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_medidas_antropometricas,'frecuencia_cardiaca_reposo'); ?>
                    </div>

                    <div class="span3">
                            <?php echo $form->labelEx($model_medidas_antropometricas,'frecuencia_cardiaca_maxima', 
                                    array('label'=>'F.C maxima')); ?>
                            <?php echo $form->textField($model_medidas_antropometricas,'frecuencia_cardiaca_maxima',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_medidas_antropometricas,'frecuencia_cardiaca_maxima'); ?>
                    </div>

                    <div class="span3">
                            <?php echo $form->labelEx($model_medidas_antropometricas,'valor_porc_entrenamiento1', 
                                    array('label'=>'% entrenamiento 1')); ?>
                            <?php echo $form->textField($model_medidas_antropometricas, 'valor_porc_entrenamiento1', array('class'=>'span3'))?>
                            <?php echo $form->error($model_medidas_antropometricas,'valor_porc_entrenamiento1'); ?>

                            <?php echo $form->textField($model_medidas_antropometricas,'porc_entrenamiento1',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_medidas_antropometricas,'porc_entrenamiento1'); ?>
                    </div>
                    
                    <div class="span3">
                            <?php echo $form->labelEx($model_medidas_antropometricas,'valor_porc_entrenamiento2', 
                                    array('label'=>'% entrenamiento 2')); ?>
                            <?php echo $form->textField($model_medidas_antropometricas, 'valor_porc_entrenamiento2', array('class'=>'span3'))?>
                            <?php echo $form->error($model_medidas_antropometricas,'valor_porc_entrenamiento2'); ?>

                            <?php echo $form->textField($model_medidas_antropometricas,'porc_entrenamiento2',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_medidas_antropometricas,'porc_entrenamiento2'); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">
                     <div class="span3">
                            <?php echo $form->labelEx($model_medidas_antropometricas,'talla', 
                                    array('label'=>'Talla')); ?>
                            <?php echo $form->textField($model_medidas_antropometricas,'talla',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_medidas_antropometricas,'talla'); ?>
                     </div>
                     
                     <div class="span3">
                         <?php echo $form->labelEx($model_medidas_antropometricas,'peso_actual', 
                                    array('label'=>'Peso actual')); ?>
                         <?php echo $form->textField($model_medidas_antropometricas,'peso_actual',
                                    array('class'=>'span5'));?>
                         <?php echo $form->error($model_medidas_antropometricas,'peso_actual'); ?>
                       
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_medidas_antropometricas,'peso_saludable', 
                                    array('label'=>'Peso saludable')); ?>
                        <?php echo $form->textField($model_medidas_antropometricas,'peso_saludable',
                                    array('class'=>'span5'));?>
                        <?php echo $form->error($model_medidas_antropometricas,'peso_saludable'); ?>
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_medidas_antropometricas,'imc', 
                                    array('label'=>'I.M.C')); ?>
                        <?php echo $form->textField($model_medidas_antropometricas,'imc',
                                    array('class'=>'span5',
                                    'onFocus'=>'js:objValFuncional.validateMedidasAntropometricas()'));?>
                        <?php echo $form->error($model_medidas_antropometricas,'imc'); ?>
                     </div>
                 </div>
            </div>
        </div>