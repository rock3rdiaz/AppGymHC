<?php
/* @var $this AntecedentesDeportivosController */
/* @var $model AntecedentesDeportivos */
/* @var $form CActiveForm */
?>

<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
    
    <?php echo $form->errorSummary($model_antecedentes_deportivos); ?>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span4">
                            <?php echo $form->labelEx($model_antecedentes_deportivos,'practica_si_no', 
                                    array('label'=>'Deporte')); ?>
                            <?php echo $form->dropDownList($model_antecedentes_deportivos,'practica_si_no',
                                    array('si'=>'Si', 'no'=>'No'), 
                            		array('onChange'=>'js:objExMedico.validateAntecedentesDeportivos($(this))')); ?>
                            <?php echo $form->error($model_antecedentes_deportivos,'practica_si_no'); ?>
                    </div>

                    <div class="span4">
                            <?php echo $form->labelEx($model_antecedentes_deportivos,'tipo_practica',
                                    array('label'=>'Tipo de pr&aacute;ctica')); ?>
                            <?php echo $form->dropDownList($model_antecedentes_deportivos,'tipo_practica',
                                    array('aficonado'=>'Aficionado', 'profesional'=>'Profesional', 'recreativo'=>'Recreativo')); ?>
                            <?php echo $form->error($model_antecedentes_deportivos,'tipo_practica'); ?>
                    </div>

                    <div class="span4">
                            <?php echo $form->labelEx($model_antecedentes_deportivos,'idDeporte',
                                    array('label'=>'Deporte que practica')); ?>
                            <?php $deportes = CHtml::listData(Deporte::model()->findAll(array('order'=>'nombre ASC')), 'idDeporte', 'nombre'); ?>
                            <?php echo $form->dropDownList($model_antecedentes_deportivos,'idDeporte',
                                    $deportes); ?>
                            <?php echo $form->error($model_antecedentes_deportivos,'idDeporte'); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">
                     <div class="span4">
                        <?php echo $form->labelEx($model_antecedentes_deportivos,'posicion_juego',
                                array('label'=>'Posici&oacute;n de juego')); ?>
                        <?php echo $form->textField($model_antecedentes_deportivos,'posicion_juego'); ?>
                        <?php echo $form->error($model_antecedentes_deportivos,'posicion_juego'); ?>
                     </div>
                     
                     <div class="span4">
                        <?php echo $form->labelEx($model_antecedentes_deportivos,'lateralidad',
                                array('label'=>'Lateralidad')); ?>
                        <?php echo $form->dropDownList($model_antecedentes_deportivos, 'lateralidad',
                                array('derecha'=>'Derecha', 'izquierda'=>'Izquierda', 'ambas'=>'Ambas')); ?>
                        <?php echo $form->error($model_antecedentes_deportivos,'lateralidad'); ?>
                     </div>
                     
                     <div class="span4">
                        <?php echo $form->labelEx($model_antecedentes_deportivos,'frecuencia_practica'); ?>
                        <?php echo $form->dropDownList($model_antecedentes_deportivos, 'frecuencia_practica',
                                array('diaria'=>'Diaria', 'dos semana'=>'Dos/Sem', 'tres semana'=>'Tres/Sem', 'semanal'=>'Semanal', 'quincenal'=>'Quincenal', 'mes'=>'Mensual')); ?>
                        <?php echo $form->error($model_antecedentes_deportivos,'frecuencia_practica'); ?>
                     </div>
                 </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">
                     <div class="span12">
                        <?php echo $form->labelEx($model_antecedentes_deportivos,'observaciones',
                                array('label'=>'Observaci&oacute;nes')); ?>
                        <?php echo $form->textField($model_antecedentes_deportivos,'observaciones',
                                array('class'=>'span10')); ?>
                        <?php echo $form->error($model_antecedentes_deportivos,'observaciones'); ?>
                     </div>
                 </div>
            </div>
        </div>