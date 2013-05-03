<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
    
    <?php echo $form->errorSummary($model); ?>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span12">
                            <?php echo $form->labelEx($model,'observaciones', 
                                    array('label'=>'Observaciones')); ?>
                            <?php echo $form->textArea($model,'observaciones', array('class'=>'span12'));?>
                            <?php echo $form->error($model,'observaciones'); ?>
                    </div>
                </div>
            </div>
        </div>