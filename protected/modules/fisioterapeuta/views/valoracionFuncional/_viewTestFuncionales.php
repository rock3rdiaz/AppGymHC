<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
    
    <?php echo $form->errorSummary($model_test_funcional); ?>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span3">
                            <?php echo $form->labelEx($model_test_funcional,'resistencia_cardiorespiratoria', 
                                    array('label'=>'Res. cardiorespiratora')); ?>
                            <?php echo $form->textField($model_test_funcional,'resistencia_cardiorespiratoria',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_test_funcional,'resistencia_cardiorespiratoria'); ?>
                    </div>

                    <div class="span3">
                            <?php echo $form->labelEx($model_test_funcional,'fuerza_abdominal', 
                                    array('label'=>'Fuerza abdominal')); ?>
                            <?php echo $form->textField($model_test_funcional,'fuerza_abdominal',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_test_funcional,'fuerza_abdominal'); ?>
                    </div>

                    <div class="span3">
                            <?php echo $form->labelEx($model_test_funcional,'resistencia_flexion_brazo', 
                                    array('label'=>'Res. flexio brazo')); ?>
                            <?php echo $form->textField($model_test_funcional,'resistencia_flexion_brazo',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_test_funcional,'resistencia_flexion_brazo'); ?>
                    </div>
                    
                    <div class="span3">
                            <?php echo $form->labelEx($model_test_funcional,'resistencia_brazo_mancuerna', 
                                    array('label'=>'Res. brazo mancuerna')); ?>
                            <?php echo $form->textField($model_test_funcional,'resistencia_brazo_mancuerna',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_test_funcional,'resistencia_brazo_mancuerna'); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">
                     <div class="span3">
                            <?php echo $form->labelEx($model_test_funcional,'resistencia_fuerza_sentadilla', 
                                    array('label'=>'Res. fueza sentadilla')); ?>
                            <?php echo $form->textField($model_test_funcional,'resistencia_fuerza_sentadilla',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_test_funcional,'resistencia_fuerza_sentadilla'); ?>
                     </div>
                     
                     <div class="span3">
                         <?php echo $form->labelEx($model_test_funcional,'fuerza_pierna_100', 
                                    array('label'=>'Res. pierna - 100%')); ?>
                         <?php echo $form->textField($model_test_funcional,'fuerza_pierna_100',
                                    array('class'=>'span5'));?>
                         <?php echo $form->error($model_test_funcional,'fuerza_pierna_100'); ?>
                       
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_test_funcional,'flexibilidad', 
                                    array('label'=>'Flexibilidad')); ?>
                        <?php echo $form->textField($model_test_funcional,'flexibilidad',
                                    array('class'=>'span5'));?>
                        <?php echo $form->error($model_test_funcional,'flexibilidad'); ?>
                     </div>
                 </div>
            </div>
        </div>