<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
    
    <?php echo $form->errorSummary(array($model_examen_fisico, 
                    $model_medidas_fisicas, $model_caracteristicas_fisicas)); ?>

<?php $this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>'Medidas fisicas',
)); ?>
<div class="well">
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span3">
                        <?php echo $form->labelEx($model_medidas_fisicas, 'ta',
                                array('label'=>'T.A (mm/Hg)'));?>
                        <?php echo $form->textField($model_medidas_fisicas, 'ta',
                                array('class'=>'span5'));?>
                        <?php echo $form->error($model_medidas_fisicas,'ta'); ?>
                    </div>

                    <div class="span3">
                        <?php echo $form->labelEx($model_medidas_fisicas, 'fc',
                                array('label'=>'F.C (min)'));?>
                        <?php echo $form->textField($model_medidas_fisicas, 'fc',
                                array('class'=>'span5'));?>
                        <?php echo $form->error($model_medidas_fisicas,'fc'); ?>
                    </div>

                    <div class="span3">
                        <?php echo $form->labelEx($model_medidas_fisicas, 'fr',
                                array('label'=>'F.R (min)'));?>
                        <?php echo $form->textField($model_medidas_fisicas, 'fr',
                                array('class'=>'span5'));?>
                        <?php echo $form->error($model_medidas_fisicas,'fr'); ?>
                    </div>
                    
                    <div class="span3">
                        <?php echo $form->labelEx($model_medidas_fisicas, 'peso',
                                array('label'=>'Peso (kg)'));?>
                        <?php echo $form->textField($model_medidas_fisicas, 'peso',
                                array('class'=>'span5'));?>
                        <?php echo $form->error($model_medidas_fisicas,'peso'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">
                     <div class="span3">
                        <?php echo $form->labelEx($model_medidas_fisicas, 'talla',
                                array('label'=>'Talla'));?>
                        <?php echo $form->textField($model_medidas_fisicas, 'talla',
                                array('class'=>'span5'));?>
                        <?php echo $form->error($model_medidas_fisicas,'talla'); ?>
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_medidas_fisicas, 'imc',
                                array('label'=>'IMC (kg/M)'));?>
                        <?php echo $form->textField($model_medidas_fisicas, 'imc',
                                array('class'=>'span5', 'onBlur'=>'js:objExMedico.validateExamenFisico()'));?>
                        <?php echo $form->error($model_medidas_fisicas,'imc'); ?>
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_medidas_fisicas, 'peso_ideal',
                                array('label'=>'Peso ideal'));?>
                        <?php echo $form->textField($model_medidas_fisicas, 'peso_ideal',
                                array('class'=>'span5'));?>
                        <?php echo $form->error($model_medidas_fisicas,'peso_ideal'); ?>
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_medidas_fisicas, 'gasto_basal_energia',
                                array('label'=>'Gasto basal (Kcal)'));?>
                        <?php echo $form->textField($model_medidas_fisicas, 'gasto_basal_energia',
                                array('class'=>'span5'));?>
                        <?php echo $form->error($model_medidas_fisicas,'gasto_basal_energia'); ?>
                     </div>
                 </div>
            </div>
        </div>
</div>
        
<?php $this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>'Valoracion general',
)); ?>
<div class="well">
        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">
                     <div class="span3">
                        <?php echo $form->labelEx($model_examen_fisico, 'estado_general',
                                array('label'=>'Estado general'));?>
                        <?php echo $form->dropdownList($model_examen_fisico, 'estado_general',
                                array('bueno'=>'Bueno', 'regular'=>'Regular', 'malo'=>'Malo'),
                                array('class'=>'span9'));?>
                        <?php echo $form->error($model_examen_fisico,'estado_general'); ?>
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_examen_fisico, 'conciente',
                                array('label'=>'Conciente'));?>
                        <?php echo $form->dropdownList($model_examen_fisico, 'conciente',
                                array('si'=>'Si', 'no'=>'No'),
                                array('class'=>'span9'));?>
                        <?php echo $form->error($model_examen_fisico,'conciente'); ?>
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_examen_fisico, 'alerta',
                                array('label'=>'Alerta'));?>
                        <?php echo $form->dropdownList($model_examen_fisico, 'alerta',
                                array('si'=>'Si', 'no'=>'No'),
                                array('class'=>'span9'));?>
                        <?php echo $form->error($model_examen_fisico,'alerta'); ?>
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_examen_fisico, 'hidratado',
                                array('label'=>'Hidratado'));?>
                        <?php echo $form->dropdownList($model_examen_fisico, 'hidratado',
                                array('si'=>'Si', 'no'=>'No'),
                                array('class'=>'span9'));?>
                        <?php echo $form->error($model_examen_fisico,'hidratado'); ?>
                     </div>
                 </div>
            </div>
        </div>
</div>

<?php $this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>'Caracteristicas fiscas',
)); ?>
<div class="well">
        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">
                     <div class="span3">
                        <?php echo $form->labelEx($model_caracteristicas_fisicas, 'cabeza',
                                array('label'=>'Cabeza'));?>
                        <?php echo $form->dropdownList($model_caracteristicas_fisicas, 'cabeza',
                                array('normal'=>'Normal', 'anormal'=>'Anormal'),
                                array('class'=>'span9'));?>
                        <?php echo $form->error($model_caracteristicas_fisicas,'cabeza'); ?>
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_caracteristicas_fisicas, 'ojos',
                                array('label'=>'Ojos'));?>
                        <?php echo $form->dropdownList($model_caracteristicas_fisicas, 'ojos',
                                array('normal'=>'Normal', 'anormal'=>'Anormal'),
                                array('class'=>'span9'));?>
                        <?php echo $form->error($model_caracteristicas_fisicas,'ojos'); ?>
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_caracteristicas_fisicas, 'orl',
                                array('label'=>'O.R.L'));?>
                        <?php echo $form->dropdownList($model_caracteristicas_fisicas, 'orl',
                                array('normal'=>'Normal', 'anormal'=>'Anormal'),
                                array('class'=>'span9'));?>
                        <?php echo $form->error($model_caracteristicas_fisicas,'orl'); ?>
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_caracteristicas_fisicas, 'cuello',
                                array('label'=>'Cuello'));?>
                        <?php echo $form->dropdownList($model_caracteristicas_fisicas, 'cuello',
                                array('normal'=>'Normal', 'anormal'=>'Anormal'),
                                array('class'=>'span9'));?>
                        <?php echo $form->error($model_caracteristicas_fisicas,'cuello'); ?>
                     </div>
                 </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">
                     <div class="span3">
                        <?php echo $form->labelEx($model_caracteristicas_fisicas, 'cp',
                                array('label'=>'C/P'));?>
                        <?php echo $form->dropdownList($model_caracteristicas_fisicas, 'cp',
                                array('normal'=>'Normal', 'anormal'=>'Anormal'),
                                array('class'=>'span9'));?>
                        <?php echo $form->error($model_caracteristicas_fisicas,'cp'); ?>
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_caracteristicas_fisicas, 'abdomen',
                                array('label'=>'Abdomen'));?>
                        <?php echo $form->dropdownList($model_caracteristicas_fisicas, 'abdomen',
                                array('normal'=>'Normal', 'anormal'=>'Anormal'),
                                array('class'=>'span9'));?>
                        <?php echo $form->error($model_caracteristicas_fisicas,'abdomen'); ?>
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_caracteristicas_fisicas, 'osteoarticular',
                                array('label'=>'Osteoarticular'));?>
                        <?php echo $form->dropdownList($model_caracteristicas_fisicas, 'osteoarticular',
                                array('normal'=>'Normal', 'anormal'=>'Anormal'),
                                array('class'=>'span9'));?>
                        <?php echo $form->error($model_caracteristicas_fisicas,'osteoarticular'); ?>
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_caracteristicas_fisicas, 'muscular',
                                array('label'=>'Muscular'));?>
                        <?php echo $form->dropdownList($model_caracteristicas_fisicas, 'muscular',
                                array('normal'=>'Normal', 'anormal'=>'Anormal'),
                                array('class'=>'span9'));?>
                        <?php echo $form->error($model_caracteristicas_fisicas,'muscular'); ?>
                     </div>
                 </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                 <div class="row-fluid">
                     <div class="span3">
                        <?php echo $form->labelEx($model_caracteristicas_fisicas, 'piel_faneras',
                                array('label'=>'Piel y faneras'));?>
                        <?php echo $form->dropdownList($model_caracteristicas_fisicas, 'piel_faneras',
                                array('normal'=>'Normal', 'anormal'=>'Anormal'),
                                array('class'=>'span9'));?>
                        <?php echo $form->error($model_caracteristicas_fisicas,'piel_faneras'); ?>
                     </div>
                     
                     <div class="span3">
                        <?php echo $form->labelEx($model_caracteristicas_fisicas, 'postura',
                                array('label'=>'Postura'));?>
                        <?php echo $form->dropdownList($model_caracteristicas_fisicas, 'postura',
                                array('normal'=>'Normal', 'anormal'=>'Anormal'),
                                array('class'=>'span9'));?>
                        <?php echo $form->error($model_caracteristicas_fisicas,'postura'); ?>
                     </div>
                     
                     <div class="span6">
                        <?php echo $form->labelEx($model_examen_fisico, 'observaciones',
                                array('label'=>'Observaciones'));?>
                        <?php echo $form->textField($model_examen_fisico, 'observaciones',
                                array('class'=>'span12'));?>
                        <?php echo $form->error($model_examen_fisico,'observaciones'); ?>
                     </div>
                 </div>
            </div>
        </div>
</div>