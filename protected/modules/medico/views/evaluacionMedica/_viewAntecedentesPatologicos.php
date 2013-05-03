<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
    
    <?php echo $form->errorSummary($model_antecedentes_patologicos); ?>

    <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                <div class="span4">
                    <?php $this->widget('bootstrap.widgets.TbButton', array(
                        'label'=>'Agregar enfermedades',
                        'buttonType'=>'button',
                        'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        'size'=>'mini', // null, 'large', 'small' or 'mini'
                        'icon'=>'icon-plus icon-white',
                        'htmlOptions'=>array('id'=>'btn_agregar_enfermedad')
                    )); ?>
            </div>
        </div>
    </div>

    <div id="div_add_enfermedad" hidden>
        <div class="well">            
        </div>
    </div>

    <input type="hidden" id="lista_enfermedades_asociadas" name="lista_enfermedades_asociadas"/>

    <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                <div class="span4">
                    <?php echo $form->labelEx($model_antecedentes_patologicos, 'habito', array('label'=>'Habito'));?>
                    <?php echo $form->dropDownList($model_antecedentes_patologicos, 'habito', 
                            array('tabaquismo'=>'Tabaquismo', 'licor'=>'Licor', 'ninguno'=>'Ninguno', 'ambos'=>'Ambos'))?>
                    <?php echo $form->error($model_antecedentes_patologicos, 'habito'); ?>
                </div>

                <div class="span4">
                    <?php echo $form->labelEx($model_antecedentes_patologicos, 'medicacion_actual', array('label'=>'Medicacion actual'));?>                
                    <?php echo $form->textField($model_antecedentes_patologicos, 'medicacion_actual');?>
                    <?php echo $form->error($model_antecedentes_patologicos, 'medicacion_actual'); ?>
                </div>

                <div class="span4">
                	<?php echo $form->labelEx($model_antecedentes_patologicos, 'antecedentes_importantes', array('label'=>'Antecedentes importantes'));?>
                    <?php echo $form->textField($model_antecedentes_patologicos, 'antecedentes_importantes')?>
                  	<?php echo $form->error($model_antecedentes_patologicos,'antecedentes_importantes'); ?>
                </div>
                
                <div class="span4">
                </div>
            </div>
        </div>
    </div>