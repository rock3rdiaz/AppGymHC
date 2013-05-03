<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'plan-entrenamiento-form',
	'enableAjaxValidation'=>false,
   	'enableClientValidation'=>true,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary(array($model, $model_trabajo_cardiovascular, $model_trabajo_estiramiento, $model_clases_grupales)); ?>

	<?php 
        if(!isset($actualiza)){
            $this->widget('bootstrap.widgets.TbLabel', array(
                    'type'=>'important', // 'success', 'warning', 'important', 'info' or 'inverse'
                    'label'=>'Valoraciones funcionales disponibles que no poseen plan de entrenamiento asignado',
            ));
        ?>
        <div class="well">  
    	    	<?php 
    	    		/*Obtengo el listado de todas las valoraciones funcionales. Solo me interesan los campos definidos*/
    	    		$criteria = new CDbCriteria();
    	    		$criteria->select = 'idValoracion_funcional, idHistoria_GYM';
    	    		$listado_val_funcionales = ValoracionFuncional::model()->findAll($criteria);

                    $vf_disponibles = array();

    	    		foreach ($listado_val_funcionales as $vf){

    	    			/*La valoracion funcional actual ya posee un plan de entrenamiento asociado?*/
    	    			if(PlanEntrenamiento::model()->findByAttributes(array('idValoracion_funcional'=>$vf->idValoracion_funcional)) == Null){
                            /*Obtenemos el id del usuario al que asociaremos el plan de entrenamiento*/
                            $id_usuario = HistoriaGYM::model()->findByPk($vf->idHistoria_GYM)->idVUsuario;

                            $vf_disponibles[$vf->idValoracion_funcional] = VUsuarios::model()->getNombreCompleto($id_usuario).'===>'. 'Codigo Valoracion Funcional = '.$vf->idValoracion_funcional;
    	    			}
    	    		}

                    echo $form->dropDownListRow($model, 'idValoracion_funcional', $vf_disponibles, array('empty'=>'-- Seleccione un usuario --', 'class'=>'span8'));
    	    	?>   
        </div>
    <?php }?>

    <?php $this->widget('bootstrap.widgets.TbLabel', array(
            'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
            'label'=>'Datos generales del usuario seleccionado',
    )); ?>
    <div class="well">
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span6"> 
                        <label for="fecha_valoracion_funcional_pe">Fecha valoracion funcional</label>
                        <input type="text" id="fecha_valoracion_funcional_pe" class="span12" disabled>                                        
                    </div>

                    <div class="span2">  
                        <label for="edad_usuario_pe">Edad</label>
                        <input type="text" id="edad_usuario_pe" class="span12" disabled>                                                
                    </div>

                    <div class="span2">
                        <label for="telefono_usuario_pe">Telefono movil</label>
                        <input type="text" id="telefono_usuario_pe" class="span12" disabled>                                              
                    </div> 

                    <div class="span2">  
                        <label for="eps_usuario_pe">EPS</label>
                        <input type="text" id="eps_usuario_pe" class="span12" disabled>                                                
                    </div>                    
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">  
                    <div class="span6">  
                        <label for="objetivo_ejercicio_pe">Objetivo del ejercicio</label>
                        <input type="text" id="objetivo_ejercicio_pe" class="span12" disabled>                                                
                    </div>

                    <div class="span6">
                        <label for="programa_entrenamiento_pe">Programa entrenamiento</label>
                        <input type="text" id="programa_entrenamiento_pe" class="span12" disabled>                                              
                    </div>                  
                </div>
            </div>
        </div>         
    </div>

    <?php $this->widget('bootstrap.widgets.TbLabel', array(
            'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
            'label'=>'Factores de riesgo',
    )); ?>
    <div class="well">
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span4"> 
                        <label for="riesgo_cardiovascular_pe">Riesgo cardiovascular</label>
                        <input type="text" id="riesgo_cardiovascular_pe" class="span12" disabled>                          
                    </div>

                    <div class="span4">  
                        <label for="riesgo_osteomuscular_pe">Riesgo osteomuscular</label>
                        <input type="text" id="riesgo_osteomuscular_pe" class="span12" disabled>                                                  
                    </div>  

                    <div class="span4">
                        <label for="frecuencia_semanal_ejercicio_pe">Frecuencia semanal de ejercicio</label>
                        <input type="text" id="frecuencia_semanal_ejercicio_pe" class="span12" disabled>                                                    
                    </div>                   
                </div>
            </div>
        </div>         
    </div>

    <?php $this->widget('bootstrap.widgets.TbLabel', array(
            'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
            'label'=>'Trabajo cardiovascular',
    )); ?>
    <div class="well">
    	<div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span3">
                       <?php echo $form->textFieldRow($model_trabajo_cardiovascular, 'continuo', array('class'=>'span12')); ?>                       
                    </div>

                	<div class="span3">
                         <?php echo $form->textFieldRow($model_trabajo_cardiovascular, 'intervalo', array('class'=>'span12')); ?>
                    </div>
                            
                    <div class="span3">
                         <?php echo $form->textFieldRow($model_trabajo_cardiovascular, 'circuito_estaciones', array('class'=>'span12')); ?>
                    </div>

                    <div class="span3">
                         <?php echo $form->dropDownListRow($model_trabajo_cardiovascular, 'categoria', array('iniciador'=>'Iniciador', 'estimulante'=>'Estimulante', 'vigoroso'=>'Vigoroso'),
                         						array('class'=>'span12')); ?>
                    </div>
                </div>
            </div>
        </div>    	
    </div>


    <?php $this->widget('bootstrap.widgets.TbLabel', array(
            'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
            'label'=>'Trabajo de estiramiento',
    )); ?>
    <div class="well">
    	<div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span4">
                       <?php echo $form->dropDownListRow($model_trabajo_estiramiento, 'nivel', array('basico'=>'Basico', 'intermedio'=>'Intermedio', 'avanzado'=>'Avanzado')); ?>                       
                    </div>

                	<div class="span4">
                         <?php echo $form->textFieldRow($model_trabajo_estiramiento, 'retracciones_musculares', array('class'=>'span12', 'maxlength'=>65)); ?>
                    </div>
                            
                    <div class="span2">
                         <?php echo $form->textFieldRow($model_trabajo_estiramiento, 'series', array('class'=>'span12')); ?>
                    </div>

                    <div class="span2">
                         <?php echo $form->textFieldRow($model_trabajo_estiramiento, 'segundos', array('class'=>'span12')); ?>
                    </div>
                </div>
            </div>
        </div>    	
    </div>

    <?php $this->widget('bootstrap.widgets.TbLabel', array(
            'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
            'label'=>'Clases grupales',
    )); ?>
    <div class="well">
    	<div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span3">
                       <?php echo $form->dropDownListRow($model_clases_grupales, 'aerobicos_instructor', array('no'=>'No', 'si'=>'Si'), array('class'=>'span10')); ?>                       
                    </div>

                	<div class="span3">
                         <?php echo $form->dropDownListRow($model_clases_grupales, 'aerobicos_basico', array('no'=>'No', 'si'=>'Si'), array('class'=>'span10')); ?>                       
                    </div>
                            
                    <div class="span3">
                         <?php echo $form->dropDownListRow($model_clases_grupales, 'localidad_abd', array('no'=>'No', 'si'=>'Si'), array('class'=>'span10')); ?>                       
                    </div>

                    <div class="span3">
                         <?php echo $form->dropDownListRow($model_clases_grupales, 'mancuerna', array('no'=>'No', 'si'=>'Si'), array('class'=>'span10')); ?>                       
                    </div>
                </div>
            </div>
        </div> 

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span3">
                       <?php echo $form->dropDownListRow($model_clases_grupales, 'fit_cross', array('no'=>'No', 'si'=>'Si'), array('class'=>'span10')); ?>                       
                    </div>

                	<div class="span3">
                         <?php echo $form->dropDownListRow($model_clases_grupales, 'flexibilidad', array('no'=>'No', 'si'=>'Si'), array('class'=>'span10')); ?>                       
                    </div>
                            
                    <div class="span3">
                         <?php echo $form->dropDownListRow($model_clases_grupales, 'step', array('no'=>'No', 'si'=>'Si'), array('class'=>'span10')); ?>                       
                    </div>

                    <div class="span3">
                         <?php echo $form->dropDownListRow($model_clases_grupales, 'gap', array('no'=>'No', 'si'=>'Si'), array('class'=>'span10')); ?>                       
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span3">
                       <?php echo $form->dropDownListRow($model_clases_grupales, 'danzika', array('no'=>'No', 'si'=>'Si'), array('class'=>'span10')); ?>                       
                    </div>

                	<div class="span3">
                         <?php echo $form->dropDownListRow($model_clases_grupales, 'master_class', array('no'=>'No', 'si'=>'Si'), array('class'=>'span10')); ?>                       
                    </div>
                            
                    <div class="span3">
                         <?php echo $form->dropDownListRow($model_clases_grupales, 'ciclismo_bajo_techo', array('no'=>'No', 'si'=>'Si'), array('class'=>'span10')); ?>                       
                    </div>

                    <div class="span3">
                         <?php echo $form->dropDownListRow($model_clases_grupales, 'pilates', array('no'=>'No', 'si'=>'Si'), array('class'=>'span10')); ?>                       
                    </div>
                </div>
            </div>
        </div>   	
    </div>

    <?php $this->widget('bootstrap.widgets.TbLabel', array(
            'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
            'label'=>'Preinscripcion del ejercicio',
    )); ?>
    <div class="well">
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span4">
                        <label for="imc_pe">IMC</label>
                        <input type="text" id="imc_pe" class="span12" disabled>                                 
                    </div>

                    <div class="span4">
                        <label for="porcentaje_graso_pe">Porcentaje graso</label>
                        <input type="text" id="porcentaje_graso_pe" class="span12" disabled> 
                    </div>  

                    <div class="span4">
                        <label for="core_pe">CORE</label>
                        <input type="text" id="core_pe" class="span12" disabled>                                 
                    </div>                      
                </div>
            </div>
        </div>  

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span6">
                       <?php echo $form->dropDownListRow($model, 'objetivo', array('fuerza resistencia'=>'Fuerza resistencia', 'resistencia a la fuerza'=>'Resistencia a la fuerza', 'hipertrofia'=>'Hipertrofia'), 
                                                        array('empty'=>'-- Seleccione una opcion --', 'class'=>'span12'));?>                        
                    </div>

                    <div class="span6">
                        <?php echo $form->dropDownListRow($model, 'tipo_trabajo', array('bloque'=>'Trabajo en bloque', 'circuito'=>'Trabajo en circuito', 'ambos'=>'Ambos'), 
                                                                            array('empty'=>'-- Seleccione una opcion --', 'class'=>'span12'));?>    
                    </div>                    
                </div>
            </div>
        </div>  

        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span6">
                        <?php echo $form->textFieldRow($model,'saludable',array('class'=>'span12','maxlength'=>60)); ?>                     
                    </div>

                    <div class="span6">
                        <?php echo $form->textFieldRow($model,'recomendaciones',array('class'=>'span12','maxlength'=>100)); ?>  
                    </div>                    
                </div>
            </div>
        </div>      
    </div>

    <?php $this->widget('bootstrap.widgets.TbLabel', array(
            'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
            'label'=>'Instructor responsable',
    )); ?>
    <div class="well">
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span6">
                       <?php echo $form->dropDownListRow($model, 'idEmpleado', $listado_instructores, array('class'=>'span12')); ?>                       
                    </div>
                </div>
            </div>
        </div> 
    </div>
    
	<?php //echo $form->textFieldRow($model,'fecha_creacion',array('class'=>'span5')); ?>
	<?php //echo $form->textFieldRow($model,'idValoracion_funcional',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'white ok',
			'label'=>$model->isNewRecord ? 'Guardar datos' : 'Actualizar datos',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<?php 
    /*Si se desean actualizar los datos de un plan de entrenamiento, se deben cargar los valores del mismo de manera diferente
    * a como si se estuviera cargando el formulario para un nuevo registro.
    */
    if(isset($actualiza)){
       $id_valoracion_funcional = $model->idValoracion_funcional;
       echo '<input id="id_valoracion_funcional" type="hidden" value="'.$id_valoracion_funcional.'">';
?>
    
    <script type="text/javascript">
        $(document).on('ready', function(){
            objPlanEntrenamiento.ajaxBuscarAntecedentesImportantes($("#id_valoracion_funcional"));
        });
    </script>
<?php }?>

