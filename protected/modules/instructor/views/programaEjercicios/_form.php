<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'programa-ejercicios-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php $this->widget('bootstrap.widgets.TbLabel', array(
            'type'=>'important', // 'success', 'warning', 'important', 'info' or 'inverse'
            'label'=>'Planes de entrenamiento sin programa de ejercicios definido',
    )); ?>
    <div class="well">
    	<?php 
    		$listado_planes_entrenamiento = PlanEntrenamiento::model()->findAll('idEmpleado = '.Yii::app()->getSession()->get('id'), array('idPlan_entrenamiento'));

    		$planes_libres = array();
    		foreach ($listado_planes_entrenamiento as $plan){
    			$plan_libre = ProgramaEjercicios::model()->findByAttributes(array('idPlan_entrenamiento'=>$plan->idPlan_entrenamiento));
    			
    			if($plan_libre == Null){
    				$planes_libres[$plan->idPlan_entrenamiento] = 'Codigo del plan de entrenamiento =======> '.$plan->idPlan_entrenamiento; 
    			}    			
    		}
    	?>   
        <div id="div_crear_boton_imprimir">
            <?php echo $form->dropDownList($model, 'idPlan_entrenamiento',
                         $planes_libres, array('class'=>'span5', 'empty'=>'-- Seleccione una opcion --'));?>
        </div> 	
    </div>


    <div id="div_rutina">
        <span class="label label-info">Lunes</span>
        <div class="well dias_rutina" id="dia_lunes">  
            <button id="lunes" class="btn btn-info btn-mini" type="button"><i class="icon-plus icon-white"></i> Add</button>      
        </div>

        <span class="label label-info">Martes</span>
        <div class="well dias_rutina" id="dia_martes"> 
            <button id="martes" class="btn btn-info btn-mini" type="button"><i class="icon-plus icon-white"></i> Add</button>                 
        </div>

        <span class="label label-info">Miercoles</span>
        <div class="well dias_rutina" id="dia_miercoles"> 
            <button id="miercoles" class="btn btn-info btn-mini" type="button"><i class="icon-plus icon-white"></i> Add</button>                 
        </div>

        <span class="label label-info">Jueves</span>
        <div class="well dias_rutina" id="dia_jueves">    
            <button id="jueves" class="btn btn-info btn-mini" type="button"><i class="icon-plus icon-white"></i> Add</button>              
        </div>

        <span class="label label-info">Viernes</span>
        <div class="well dias_rutina" id="dia_viernes">  
            <button id="viernes" class="btn btn-info btn-mini" type="button"><i class="icon-plus icon-white"></i> Add</button>                
        </div>

        <span class="label label-info">Sabado</span>
        <div class="well dias_rutina" id="dia_sabado">
            <button id="sabado" class="btn btn-info btn-mini" type="button"><i class="icon-plus icon-white"></i> Add</button>                  
        </div>
    </div>


	<?php //echo $form->textFieldRow($model,'fecha_realizacion',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'observaciones',array('class'=>'span9','maxlength'=>100)); ?>

	<?php //echo $form->textFieldRow($model,'idPlan_entrenamiento',array('class'=>'span5')); ?>

	<input type="hidden" id="datos_programa_ejercicio" name="datos_programa_ejercicio">

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'button',
			'type'=>'primary',
            'icon'=>'white ok',
			'label'=>$model->isNewRecord ? 'Guardar datos' : 'Actualizar datos',
            'htmlOptions'=>array('id'=>'btn_enviar_programa_ejercicios')
		)); ?>

		<?php  
             $this->widget('bootstrap.widgets.TbButton', array(
                        'label'=>'Regresar',
                        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        'size'=>'', // '', 'large', 'small' or 'mini'
                        'url'=>array('admin'),
                        'icon'=>'white remove',
                )); ?>
	</div>

<?php $this->endWidget();?>