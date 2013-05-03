<?php
$this->breadcrumbs=array(
	'Programa Ejercicios'=>array('admin'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List ProgramaEjercicios','url'=>array('index')),
	array('label'=>'Manage ProgramaEjercicios','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos_acciones">Creaci&oacute;n de Programa de ejercicios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php
    Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/Miscelaneaus.js',
       CClientScript::POS_END
    );
?>