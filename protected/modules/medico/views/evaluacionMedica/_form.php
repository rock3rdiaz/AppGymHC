<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'evaluacion-medica-form',
            'enableAjaxValidation'=>false,
            'enableClientValidation'=>true,
    )); ?>


    <?php /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    ++++++++++++++++++++++ Fragmento de codigo que permite traer de manera dinamica los usuarios que tienen citas funcionales pendientes para el dia actual. Una vez se elecciona el usuario a atender
    ++++++++++++++++++++++ Se ubican sus datos en el encabezado del formulario. La lista que se despliega esta ordenada por la hora de la cita. ++++++++++++++++++++++++++++++++++++++++++++++++++++*/?>
    <?php

    if(!isset($actualizar)){
        $this->widget('bootstrap.widgets.TbLabel', array(
            'type'=>'important', // 'success', 'warning', 'important', 'info' or 'inverse'
            'label'=>'Citas pendientes para el dia de hoy',
        )); ?>
        <div class="well">
            <?php

                   $listado_citas_hoy = Cita::model()->getCitasDeHoy('medica'); 
                   $listado = array();

                   foreach ($listado_citas_hoy as $r){
                        //Obtenemos mediante consultas asociadas al id del usuario en cita los datos del encabezado de la evaluacion.
                        $nombre_usuario = VUsuarios::model()->getNombreCompleto($r['idVUsuario']);
                        $fecha_nacimiento_usuario = VUsuarios::model()->findByAttributes(array('id_usuarios'=>$r['idVUsuario']))->fecha_nac;
                        $sexo_usuario = VUsuarios::model()->findByAttributes(array('id_usuarios'=>$r['idVUsuario']))->sexo;
                        $direccion_residencia_usuario = VUsuarios::model()->findByAttributes(array('id_usuarios'=>$r['idVUsuario']))->direccion;
                        $telefono_usuario = VUsuarios::model()->findByAttributes(array('id_usuarios'=>$r['idVUsuario']))->telefono;

                        //Construimos el key del array asociativo uniendo todos los datos del encabezado, separando cada valor por el caracter '|', mismo que sera util al descomponer la cadena desde javascript.
                        $listado[$r['idCita'].'|'.$r['fecha'].'|'.$fecha_nacimiento_usuario.'|'.$r['idVUsuario'].'|'.$nombre_usuario.'|'.$sexo_usuario.'|'.$direccion_residencia_usuario.'|'.$telefono_usuario.'|'.$r['motivo']] = $nombre_usuario. ' ----> '. $r['fecha']; 
                    }               
                ?>  

                <div class="row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <div class="span8">
                                    <?php echo CHtml::dropDownList('html_listado_citas', '', $listado, array('empty'=>'--- Seleccione un usuario ---', 
                                                            'class'=>'span12', 'onChange'=>'js:objExMedico.setDatosGenerales()'));//'setDatosGenerales()' se encarga de separarnos los valores y procesarlos?>
                                </div>
                                
                                <div class="span2">
                                    <?php echo CHtml::textField('txt_motivo_cita_em', '', array('class'=>'span12'))?>
                                </div>

                                <div class="span2">
                                    <?php echo CHtml::textField('txt_id_cita_em', '', array('class'=>'span12'))?>
                                </div>
                            </div>
                        </div>
                </div>
        </div>
    <?php }?>
    <?php /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/?>


    
        <?php 
        /********************** Datos generales de la evaluacion medica *********************************************/
            $this->widget('bootstrap.widgets.TbLabel', array(
                    'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
                    'label'=>'Datos generales',
            )); ?>
        <div class="well">
            <?php $this->renderPartial('_viewDatosGenerales', array('model'=>$model, 
                            'model_datos_extra_usuario'=>$model_datos_extra_usuario,
                            'form'=>$form));?>
        </div>

        <?php
        /**************************** Seccion donde se definen las pestañas del Tab principal **********************************/
            $this->widget('bootstrap.widgets.TbTabs', array(
            'type'=>'tabs', // 'tabs' or 'pills'
            'tabs'=>array(
                array('label'=>'Antecedentes deportivos', 'content'=>$this->renderPartial('_viewAntecedentesDeportivos', 
                        array('model_antecedentes_deportivos'=>$model_antecedentes_deportivos, 
                            'form'=>$form), $this), 'active'=>true),

                array('label'=>'Antecedentes ginecobstetricos', 'content'=>$this->renderPartial('_viewAntecedentesGinecobstetricos', 
                        array('model_antecedentes_ginecobstetricos'=>$model_antecedentes_ginecobstetricos, 
                            'form'=>$form), $this)),
                
                array('label'=>'Antecedentes de trauma y lesiones deportivas', 'content'=>$this->renderPartial('_viewAntecedentesTraumaLesion', 
                        array('model_antecedentes_trauma_lesion'=>$model_antecedentes_trauma_lesion,
                            'form'=>$form), $this)),
                
                array('label'=>'Impresion diagnostica', 'content'=>$this->renderPartial('_viewImpresionDiagnostica', 
                        array('model_impresion_diagnostica'=>$model_impresion_diagnostica,
                            //'model_examen'=>$model_examen,
                            'form'=>$form), $this)),
                
                array('label'=>'Examen fisico', 'content'=>$this->renderPartial('_viewExamenFisico', 
                        array('model_examen_fisico'=>$model_examen_fisico,
                            'model_caracteristicas_fisicas'=>$model_caracteristicas_fisicas,
                            'model_medidas_fisicas'=>$model_medidas_fisicas,
                            'form'=>$form), $this)),
                
                array('label'=>'Enfermedades', 'content'=>$this->renderPartial('_viewAntecedentesPatologicos', 
						array('model_antecedentes_patologicos'=>$model_antecedentes_patologicos,
							//'model_antecedentes_patologicos_enfermedad'=>$model_antecedentes_patologicos_enfermedad,
							//'model_enfermedad'=>$model_enfermedad,
							'form'=>$form), $this)),
                /*array('label'=>'Dropdown', 'items'=>array(
                    array('label'=>'@fat', 'content'=>''),
                    array('label'=>'@mdo', 'content'=>''),
                )),*/
            ),
        )); ?>
        
        <div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'button',
				'type'=>'primary',
	            'icon'=>'white ok',
				'label'=>$model->isNewRecord ? 'Guardar datos' : 'Actualizar datos',
				'htmlOptions'=>array('id'=>'btn_guardar_ex_medico')
			)); ?>
		</div>

    <?php $this->endWidget(); ?>
</div>

<?php 
    /*Si se desean actualizar los datos de una valoracion medica, se deben cargar los valores de la misma de manera diferente
    * a como si se estuviera cargando el formulario para un nuevo registro.
    */
    if(isset($actualizar)){
        $id_usuario = HistoriaGym::model()->getIdUsuario('evaluacion_medica', 'idEvaluacion_medica', $model->getPrimaryKey())[0]->idVUsuario;
        $nombre_usuario = VUsuarios::model()->getNombreCompleto($id_usuario);
        $fecha_nacimiento_usuario = VUsuarios::model()->findByAttributes(array('id_usuarios'=>$id_usuario))->fecha_nac;
        $sexo_usuario = VUsuarios::model()->findByAttributes(array('id_usuarios'=>$id_usuario))->sexo;
        $direccion_residencia_usuario = VUsuarios::model()->findByAttributes(array('id_usuarios'=>$id_usuario))->direccion;
        $telefono_usuario = VUsuarios::model()->findByAttributes(array('id_usuarios'=>$id_usuario))->telefono;

        $listado = ''.'|'.''.'|'.$fecha_nacimiento_usuario.'|'.$id_usuario.'|'.$nombre_usuario.'|'.$sexo_usuario.'|'.$direccion_residencia_usuario.'|'.$telefono_usuario.'|'.'';
        echo '<input id="html_listado_citas" type="hidden" value="'.$listado.'">';
?>
    
    <script type="text/javascript">
        $(document).on('ready', function(){
            objExMedico.setDatosGenerales();
        });
    </script>
<?php }?>