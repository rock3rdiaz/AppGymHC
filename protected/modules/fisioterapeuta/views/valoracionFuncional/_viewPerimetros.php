<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
    
    <?php echo $form->errorSummary($model_perimetro); ?>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span3">
                            <?php echo $form->labelEx($model_perimetro,'triceps', 
                                    array('label'=>'Triceps')); ?>
                            <?php echo $form->textField($model_perimetro,'triceps',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_perimetro,'triceps'); ?>
                    </div>

                    <div class="span3">
                            <?php echo $form->labelEx($model_perimetro,'cintura', 
                                    array('label'=>'Cintura')); ?>
                            <?php echo $form->textField($model_perimetro,'cintura',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_perimetro,'cintura'); ?>
                    </div>

                    <div class="span3">
                            <?php echo $form->labelEx($model_perimetro,'pectoral', 
                                    array('label'=>'Pectoral')); ?>
                            <?php echo $form->textField($model_perimetro,'pectoral',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_perimetro,'pectoral'); ?>
                    </div>
                    
                    <div class="span3">
                            <?php echo $form->labelEx($model_perimetro,'abdominal', 
                                    array('label'=>'Abdominal')); ?>
                            <?php echo $form->textField($model_perimetro,'abdominal',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_perimetro,'abdominal'); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">
                     <div class="span3">
                            <?php echo $form->labelEx($model_perimetro,'cadera', 
                                    array('label'=>'Cadera')); ?>
                            <?php echo $form->textField($model_perimetro,'cadera',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_perimetro,'cadera'); ?>
                     </div>
                     
                     <div class="span3">
                         <?php echo $form->labelEx($model_perimetro,'muslo', 
                                    array('label'=>'Muslo')); ?>
                         <?php echo $form->textField($model_perimetro,'muslo',
                                    array('class'=>'span5'));?>
                         <?php echo $form->error($model_perimetro,'muslo'); ?>
                       
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_perimetro,'pantorrilla', 
                                    array('label'=>'Pantorrilla')); ?>
                        <?php echo $form->textField($model_perimetro,'pantorrilla',
                                    array('class'=>'span5'));?>
                        <?php echo $form->error($model_perimetro,'pantorrilla'); ?>
                     </div>
                 </div>
            </div>
        </div>