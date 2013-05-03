<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
    
    <?php echo $form->errorSummary($model_pliegue); ?>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span3">
                            <?php echo $form->labelEx($model_pliegue,'triceps', 
                                    array('label'=>'Triceps')); ?>
                            <?php echo $form->textField($model_pliegue,'triceps',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_pliegue,'triceps'); ?>
                    </div>

                    <div class="span3">
                            <?php echo $form->labelEx($model_pliegue,'sub_escapular', 
                                    array('label'=>'Sub-escapular')); ?>
                            <?php echo $form->textField($model_pliegue,'sub_escapular',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_pliegue,'sub_escapular'); ?>
                    </div>

                    <div class="span3">
                            <?php echo $form->labelEx($model_pliegue,'suprailiaco', 
                                    array('label'=>'Suprailiaco')); ?>
                            <?php echo $form->textField($model_pliegue,'suprailiaco',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_pliegue,'suprailiaco'); ?>
                    </div>
                    
                    <div class="span3">
                            <?php echo $form->labelEx($model_pliegue,'abdominal', 
                                    array('label'=>'Abdominal')); ?>
                            <?php echo $form->textField($model_pliegue,'abdominal',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_pliegue,'abdominal'); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">
                     <div class="span3">
                            <?php echo $form->labelEx($model_pliegue,'muslo', 
                                    array('label'=>'Muslo')); ?>
                            <?php echo $form->textField($model_pliegue,'muslo',
                                    array('class'=>'span5'));?>
                            <?php echo $form->error($model_pliegue,'muslo'); ?>
                     </div>
                     
                     <div class="span3">
                         <?php echo $form->labelEx($model_pliegue,'pantorrilla', 
                                    array('label'=>'Pantorrilla')); ?>
                         <?php echo $form->textField($model_pliegue,'pantorrilla',
                                    array('class'=>'span5'));?>
                         <?php echo $form->error($model_pliegue,'pantorrilla'); ?>
                       
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_pliegue,'porc_grasa', 
                                    array('label'=>'% grasa')); ?>
                        <?php echo $form->textField($model_pliegue,'porc_grasa',
                                    array('class'=>'span5'));?>
                        <?php echo $form->error($model_pliegue,'porc_grasa'); ?>
                     </div>
                 </div>
            </div>
        </div>