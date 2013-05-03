<?php
$this->breadcrumbs=array(
	'Administracion examenes'=>array('admin'),
	'Administrar',
);

/*$this->menu=array(
	array('label'=>'List Examen','url'=>array('index')),
	array('label'=>'Create Examen','url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('examen-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="h1_titulos_acciones">Administraci&oacute;n de ex&aacute;menes</h1>

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
	'id'=>'examen-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped condensed',
	//'filter'=>$model,
	'columns'=>array(
		//'idExamen',
		array('header'=>'Nombre del usuario',
			'value'=>'VUsuarios::model()->getNombreCompleto($data->idEvaluacionMedica->idHistoriaGYM->idVUsuario)'),
		'descripcion',	
		'fecha_expedicion',	
		'fecha_realizacion',
		//array('name'=>'idVUsuario', 'value'=>'VUsuarios::model()->getNombreCompleto($data->idVUsuario)'),
		'resultado',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',                       
		),
	),
)); ?>

<?php 
/*Boton de creacion de registro*/
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Crear nuevo examen',
    'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'', // '', 'large', 'small' or 'mini'
    'url'=>array('create'),
    'icon'=>'white ok',
)); ?>

