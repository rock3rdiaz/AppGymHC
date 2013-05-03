<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
    
    <?php echo $form->errorSummary($model_frecuencia_entrenamiento); ?>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span4">
                            <?php echo $form->labelEx($model_frecuencia_entrenamiento,'sesiones_semana', 
                                    array('label'=>'Sesiones por semana (en dias)')); ?>
                            <?php echo $form->textField($model_frecuencia_entrenamiento,'sesiones_semana');?>
                            <?php echo $form->error($model_frecuencia_entrenamiento,'sesiones_semana'); ?>
                    </div>

                    <div class="span4">
                            <?php echo $form->labelEx($model_frecuencia_entrenamiento,'tiempo_entrenamiento', 
                                    array('label'=>'Minutos de entrenamiento')); ?>
                            <?php echo $form->textField($model_frecuencia_entrenamiento,'tiempo_entrenamiento');?>
                            <?php echo $form->error($model_frecuencia_entrenamiento,'tiempo_entrenamiento'); ?>
                    </div>

                    <div class="span4">
                            <?php echo $form->labelEx($model_frecuencia_entrenamiento,'habitos_nutricionales', 
                                    array('label'=>'Habitos nutricionales')); ?>
                            <?php echo $form->textField($model_frecuencia_entrenamiento,'habitos_nutricionales');?>
                            <?php echo $form->error($model_frecuencia_entrenamiento,'habitos_nutricionales'); ?>
                    </div>
                </div>
            </div>
        </div>