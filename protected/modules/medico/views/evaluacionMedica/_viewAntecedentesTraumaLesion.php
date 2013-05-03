<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
    
    <?php echo $form->errorSummary($model_antecedentes_trauma_lesion); ?>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span4">
                    		<?php echo $form->labelEx($model_antecedentes_trauma_lesion, 'contusion', array('label'=>'Contusiones'));?>                           
                            <?php echo $form->textField($model_antecedentes_trauma_lesion, 'contusion');?>
                            <?php echo $form->error($model_antecedentes_trauma_lesion, 'contusion'); ?>
                    </div>

                    <div class="span4">
                            <?php echo $form->labelEx($model_antecedentes_trauma_lesion, 'distension', array('label'=>'Distenciones'));?>                           
                            <?php echo $form->textField($model_antecedentes_trauma_lesion, 'distension');?>
                            <?php echo $form->error($model_antecedentes_trauma_lesion, 'distension'); ?>
                    </div>

                    <div class="span4">
                            <?php echo $form->labelEx($model_antecedentes_trauma_lesion, 'esguince', array('label'=>'Esguinces'));?>                           
                            <?php echo $form->textField($model_antecedentes_trauma_lesion, 'esguince');?>
                            <?php echo $form->error($model_antecedentes_trauma_lesion, 'esguince'); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">
                     <div class="span4">
                        <?php echo $form->labelEx($model_antecedentes_trauma_lesion, 'luxacion', array('label'=>'Luxaciones'));?>                           
                        <?php echo $form->textField($model_antecedentes_trauma_lesion, 'luxacion');?>
                        <?php echo $form->error($model_antecedentes_trauma_lesion, 'luxacion'); ?>
                     </div>
                     
                     <div class="span4">
                        <?php echo $form->labelEx($model_antecedentes_trauma_lesion, 'fractura', array('label'=>'Fracturas'));?>                           
                        <?php echo $form->textField($model_antecedentes_trauma_lesion, 'fractura');?>
                        <?php echo $form->error($model_antecedentes_trauma_lesion, 'fractura'); ?>
                     </div>
                     
                     <div class="span4">
                        <?php echo $form->labelEx($model_antecedentes_trauma_lesion, 'quirurgico', array('label'=>'Quirurgicos'));?>                           
                        <?php echo $form->textField($model_antecedentes_trauma_lesion, 'quirurgico');?>
                        <?php echo $form->error($model_antecedentes_trauma_lesion, 'quirurgico'); ?>
                     </div>
                 </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">
                     <div class="span12">
                        <?php echo $form->labelEx($model_antecedentes_trauma_lesion, 'otros', array('label'=>'Otras lesiones'));?>                           
                        <?php echo $form->textField($model_antecedentes_trauma_lesion, 'otros');?>
                        <?php echo $form->error($model_antecedentes_trauma_lesion, 'otros'); ?>
                     </div>
                 </div>
            </div>
        </div>