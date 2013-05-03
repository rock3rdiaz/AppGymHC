<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
    
    <?php echo $form->errorSummary(array($model_impresion_diagnostica/*,
                            $model_examen*/)); ?>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span4">
                        <?php echo $form->labelEx($model_impresion_diagnostica, 'riesgo_cardiovascular',
                                array('label'=>'Riesgo cardiovascular'));?>
                        <?php echo $form->dropDownList($model_impresion_diagnostica, 'riesgo_cardiovascular', 
                                array('leve'=>'Leve/Bajo', 'moderado'=>'Moderado', 'severo'=>'Severo', 'alto'=>'Muy alto'));?>
                        <?php echo $form->error($model_impresion_diagnostica, 'riesgo_cardiovascular'); ?>
                    </div>

                    <div class="span4">
                        <?php echo $form->labelEx($model_impresion_diagnostica, 'riesgo_osteomuscular',
                                array('label'=>'Riesgo Osteomuscular'));?>
                        <?php echo $form->dropDownList($model_impresion_diagnostica, 'riesgo_osteomuscular', 
                                array('no'=>'Negativo', 'si'=>'Positivo', 'otro'=>'Otro'));?>
                        <?php echo $form->error($model_impresion_diagnostica, 'riesgo_osteomuscular'); ?>
                    </div>
                    
                    <div class="span4">
                        <?php echo $form->labelEx($model_impresion_diagnostica, 'peso',
                                array('label'=>'Peso'));?>
                        <?php echo $form->dropDownList($model_impresion_diagnostica, 'peso', 
                                array('bajo'=>'Bajo (IMC < 18,5)', 'normal'=>'Normal (IMC 18,5 - 24,9)', 'sobrepeso'=>'Sobrepeso (IMC 25 - 29,9)',
                                    'obesidad e1'=>'Obesidad E1 (IMC 30 - 34,9)', 'obesidad e2'=>'Obesidad E2 (IMC 34 - 39,9)', 'obesidad e3'=>'Obesidad E3 (IMC > 40)'));?>
                        <?php echo $form->error($model_impresion_diagnostica, 'peso'); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">
                     <div class="span4">
                        <?php echo $form->labelEx($model_impresion_diagnostica, 'conducta',
                                array('label'=>'Conducta'));?>
                        <?php echo $form->textField($model_impresion_diagnostica, 'conducta');?>
                        <?php echo $form->error($model_impresion_diagnostica, 'conducta'); ?>
                     </div>
                     
                     <div class="span4">
                        <?php echo $form->labelEx($model_impresion_diagnostica, 'observaciones',
                                array('label'=>'Observaciones'));?>
                        <?php echo $form->textField($model_impresion_diagnostica, 'observaciones');?>
                        <?php echo $form->error($model_impresion_diagnostica, 'observaciones'); ?>
                     </div>
                     
                     <div class="span4">
                        <?php echo $form->labelEx($model_impresion_diagnostica, 'recomendaciones_nutricionales',
                                array('label'=>'Recomendaciones nutricionales'));?>
                        <?php echo $form->textField($model_impresion_diagnostica, 'recomendaciones_nutricionales');?>
                        <?php echo $form->error($model_impresion_diagnostica, 'recomendaciones_nutricionales'); ?>
                     </div>
                 </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">                     
                     <div class="span4">
                        <?php echo $form->labelEx($model_impresion_diagnostica, 'tipo_actividad_fisica',
                                array('label'=>'Recomendacion actividad fisica'));?>
                        <?php echo $form->dropDownList($model_impresion_diagnostica, 'tipo_actividad_fisica',
                                array('libre'=>'Sin restriccion', 'restrictiva'=>'Con restriccion'));?>
                        <?php echo $form->error($model_impresion_diagnostica, 'tipo_actividad_fisica'); ?>
                     </div>
                     
                     <div class="span4">
                        <?php echo $form->labelEx($model_impresion_diagnostica, 'justificacion_actividad_fisica',
                                array('label'=>'Justificacion'));?>
                        <?php echo $form->textField($model_impresion_diagnostica, 'justificacion_actividad_fisica');?>
                        <?php echo $form->error($model_impresion_diagnostica, 'justificacion_actividad_fisica'); ?>
                     </div>

                     <div class="span4">
                        
                     </div>
                 </div>
            </div>
        </div>
