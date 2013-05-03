<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
    
    <?php echo $form->errorSummary($model_antecedentes_ginecobstetricos); ?>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span4">
                        <?php echo $form->labelEx($model_antecedentes_ginecobstetricos, 'aplica_si_no', array('label'=>'Aplica'));?>
                        <?php echo $form->dropDownList($model_antecedentes_ginecobstetricos, 'aplica_si_no', 
                                array('si'=>'Si', 'no'=>'No'),
                        		array('onChange'=>'js:objExMedico.validateAntecedentesGinecobstetricos($(this))'));?>
                        <?php echo $form->error($model_antecedentes_ginecobstetricos, 'aplica_si_no'); ?>
                    </div>

                    <div class="span4">
                        <?php echo $form->labelEx($model_antecedentes_ginecobstetricos, 'ciclo', array('label'=>'Ciclos'));?>
                        <?php echo $form->dropDownList($model_antecedentes_ginecobstetricos, 'ciclo', 
                                array('regular'=>'Regulares', 'irregular'=>'Irregular', 'dismenorrea'=>'Dismenorreas'));?>
                        <?php echo $form->error($model_antecedentes_ginecobstetricos,'ciclo'); ?>
                    </div>

                    <div class="span4">
                    	<?php echo $form->labelEx($model_antecedentes_ginecobstetricos, 'pf', array('label'=>'P.F'));?>
                        <?php echo $form->dropDownList($model_antecedentes_ginecobstetricos, 'pf', 
                                array('aco'=>'A.C.O', 'inyectable'=>'Inyectables Mes/Trimestral', 'diu'=>'DIU', 'preservativos'=>'Preservativos'));?>
                        <?php echo $form->error($model_antecedentes_ginecobstetricos,'pf'); ?>                            
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">
                     <div class="span4">
                     	<?php echo $form->labelEx($model_antecedentes_ginecobstetricos, 'otros', array('label'=>'Otros'));?>
                        <?php echo $form->textField($model_antecedentes_ginecobstetricos, 'otros');?>
                        <?php echo $form->error($model_antecedentes_ginecobstetricos,'otros'); ?>
                     </div>
                     
                     <div class="span4">
                        
                     </div>
                     
                     <div class="span4">
                        
                     </div>
                 </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">
                     <div class="span12">
                        
                     </div>
                 </div>
            </div>
        </div>