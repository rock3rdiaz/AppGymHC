<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'valoracion-funcional-form',
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
            ));             
    ?>
        <div class="well">
            <?php

               $listado_citas_hoy = Cita::model()->getCitasDeHoy('funcional'); 
               $listado = array();

               foreach ($listado_citas_hoy as $r){
                    //Obtenemos mediante consultas asociadas al id del usuario en cita los datos del encabezado de la evaluacion.
                    $nombre_usuario = VUsuarios::model()->getNombreCompleto($r['idVUsuario']);
                    $fecha_nacimiento_usuario = VUsuarios::model()->findByAttributes(array('id_usuarios'=>$r['idVUsuario']))->fecha_nac;

                    $listado[$r['idCita'].'|'.$r['fecha'].'|'.$fecha_nacimiento_usuario.'|'.$r['idVUsuario'].'|'.$nombre_usuario.'|'.$r['motivo']] = $nombre_usuario. ' ----> '. $r['fecha']; 
                }
            ?>

            <div class="row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <div class="span8">
                                <?php echo CHtml::dropDownList('html_listado_citas', '', $listado, array('empty'=>'--- Seleccione un usuario ---', 
                                                        'class'=>'span12', 'onChange'=>'js:objValFuncional.setDatosGenerales()'));//'setDatosGenerales()' se encarga de separarnos los valores y procesarlos?>
                            </div>

                            <div class="span2">
                                <?php echo CHtml::textField('txt_motivo_cita_vf', '', array('class'=>'span12'))?>
                            </div>
                            
                            <div class="span2">
                                <?php echo CHtml::textField('txt_id_cita_vf', '', array('class'=>'span12'))?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    <?php 
        }        
    ?>    
    <?php /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/?>

    
        <?php 
        /********************** Datos generales de la valoracion *********************************************/
            $this->widget('bootstrap.widgets.TbLabel', array(
                    'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
                    'label'=>'Datos generales',
            )); ?>
        <div class="well">
            <?php $this->renderPartial('_viewDatosGenerales', 
                    array('model'=>$model, 'form'=>$form));?>
        </div>
    
        <?php 
        /************************************** Antecedentes del usuario ************************************/
            $this->widget('bootstrap.widgets.TbLabel', array(
                'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
                'label'=>'Antecedentes del usuario',
            )); ?>
        <div class="well">
            <?php $this->renderPartial('_viewAntecedentesUsuario', 
                    array('model_antecedentes_usuario'=>$model_antecedentes_usuario, 'form'=>$form));?>
        </div>
    
    
        <?php 
        /********************* Seccion donde se definen las pestanias del Tab principal ******************************/
        $this->widget('bootstrap.widgets.TbTabs', array(
            'type'=>'tabs', // 'tabs' or 'pills'
            'tabs'=>array(
                array('label'=>'Medidas antropometricas', 'content'=>$this->renderPartial('_viewMedidasAntropometricas', 
                        array('model_medidas_antropometricas'=>$model_medidas_antropometricas, 
                            'form'=>$form), $this), 'active'=>true),

                array('label'=>'Pliegues', 'content'=>$this->renderPartial('_viewPliegues', 
                        array('model_pliegue'=>$model_pliegue, 
                            'form'=>$form), $this)),
                
                array('label'=>'Perimetros', 'content'=>$this->renderPartial('_viewPerimetros', 
                        array('model_perimetro'=>$model_perimetro,
                            'form'=>$form), $this)),
                
                array('label'=>'Test funcionales', 'content'=>$this->renderPartial('_viewTestFuncionales', 
                        array('model_test_funcional'=>$model_test_funcional,
                            'form'=>$form), $this)),
                
                array('label'=>'Frecuencia de entrenamiento', 'content'=>$this->renderPartial('_viewFrecuenciaEntrenamiento', 
                        array('model_frecuencia_entrenamiento'=>$model_frecuencia_entrenamiento,
                            'form'=>$form), $this)),
                
                array('label'=>'Observaciones', 'content'=>$this->renderPartial('_viewObservaciones', 
                        array('model'=>$model,
                           'form'=>$form), $this)),
            ),
        )); ?>
    
        <div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'button',
			'type'=>'primary',
            'icon'=>'white ok',
			'label'=>$model->isNewRecord ? 'Guardar datos' : 'Actualizar datos',
			'htmlOptions'=>array('id'=>'btn_guardar_val_funcional')
		)); ?>
	</div>

    <?php $this->endWidget(); ?>
</div>

<?php 
    /*Si se desean actualizar los datos de una valoracion funcional, se deben cargar los valores de la misma de manera diferente
    * a como si se estuviera cargando el formulario para un nuevo registro.
    */
    if(isset($actualizar)){
        $id_usuario = HistoriaGym::model()->getIdUsuario('valoracion_funcional', 'idValoracion_funcional', $model->getPrimaryKey())[0]->idVUsuario;
        $nombre_usuario = VUsuarios::model()->getNombreCompleto($id_usuario);
        $fecha_nacimiento_usuario = VUsuarios::model()->findByAttributes(array('id_usuarios'=>$id_usuario))->fecha_nac;

        $listado = ''.'|'.''.'|'.$fecha_nacimiento_usuario.'|'.$id_usuario.'|'.$nombre_usuario.'|'.''; 
        echo '<input id="html_listado_citas" type="hidden" value="'.$listado.'">';
?>
    
    <script type="text/javascript">
        $(document).on('ready', function(){
            objValFuncional.setDatosGenerales();
        });
    </script>
<?php }?>


