<?php
$this->breadcrumbs=array(
	'Vusuarioses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List VUsuarios','url'=>array('index')),
	array('label'=>'Create VUsuarios','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('vusuarios-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Vusuarioses</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'vusuarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_usuarios',
		'identificacion',
		'tipo_identificacion',
		'primer_nombre',
		'segundo_nombre',
		'primer_apellido',
		/*
		'segundo_apellido',
		'sexo',
		'fecha_nac',
		'fecha_ingreso',
		'direccion',
		'telefono',
		'celular',
		'mail',
		'tipo',
		'categoria',
		'estado',
		'tipo_ingreso',
		'id_grupo',
		'id_profesion',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
