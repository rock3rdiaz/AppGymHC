<?php
$this->breadcrumbs=array(
	'Administracion citas'=>array('admin'),
	'Administracion',
);

/*$this->menu=array(
	array('label'=>'List Cita','url'=>array('index')),
	array('label'=>'Create Cita','url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cita-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="h1_titulos_acciones">Administraci&oacute;n de citas</h1>

<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<?php echo CHtml::link('B&uacute;squeda avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'cita-grid',
	'type'=>'condensed striped',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'idCita',
        array('header'=>'Nombre usuario', 'value'=>'VUsuarios::model()->getNOmbreCompleto($data->idVUsuario)'),
		array('name'=>'tipo', 'header'=>'Tipo',
                    'value'=>'($data->tipo == "medica")?"Examen medico":"Valoracion funcional"'),
		array('name'=>'fecha', 'header'=>'Fecha y hora'),
		array('name'=>'motivo', 'header'=>'Motivo',
                    'value'=>'ucfirst($data->motivo)'),
		'estado',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); ?>

<?php 
/*Boton de creacion de registro*/
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Crear nueva cita',
    'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'', // '', 'large', 'small' or 'mini'
    'url'=>array('create'),
    'icon'=>'white ok',
)); ?>
