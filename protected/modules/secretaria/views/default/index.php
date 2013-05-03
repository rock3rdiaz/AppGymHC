<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1 class="h1_titulos_acciones">Programaci&oacute;n de citas</h1>

<?php

/*$arr = Cita::model()->getCitas();
print_r($arr);*/

$this->widget('application.extensions.fullcalendar.FullcalendarGraphWidget', 
    array(
        'data'=>Cita::model()->getAllCitas(),
        
        'options'=>array(
            'editable'=>false,
            //'selectable'=>true,
            
            //Muestro por defecto las vistas diaria, mensual y semanal
            /*'header'=>array('left'=>'prev,next today', 'center'=>'title', 'right'=>'month,agendaWeek,agendaDay'),*/
            
            //Meses
            'monthNames'=>array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'),
            
            //Dias
            'dayNames'=>array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes'),
            'dayNamesShort'=>array('Dom','Lun','Mar','Mier','Jue','Vie','Sab'),
            
            //Etiqueta de los botones
            'buttonText'=>array('today'=>'Hoy', 'month'=>'Mensual', 'week'=>'Semanal', 'day'=>'Diario'),
            'weekends'=>false,
            //'theme'=>true,
          
            //eventClick'=>'js:function(event, eventElement){alert("hello");}',
            
            //'eventClick'=>''
			
        	//'events'=>array('json-events.php'), 
           
            ),
        'htmlOptions'=>array(
               'style'=>'width:100%;margin: 0 auto;'
        ),
    )
);
?>