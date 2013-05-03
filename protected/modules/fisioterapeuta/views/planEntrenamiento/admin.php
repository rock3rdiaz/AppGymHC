<?php
$this->breadcrumbs=array(
	'Planes Entrenamiento'=>array('admin'),
	'Administrar planes de entrenamiento',
);

/*$this->menu=array(
	array('label'=>'List PlanEntrenamiento','url'=>array('index')),
	array('label'=>'Create PlanEntrenamiento','url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('plan-entrenamiento-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="h1_titulos_acciones">Administraci&oacute;n de los planes de entrenamiento</h1>

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
	'id'=>'plan-entrenamiento-grid',
	'type'=>'striped condensed',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'idPlan_entrenamiento',
		array('header'=>'Nombre propietario', 
			'value'=>'VUsuarios::model()->getNombreCompleto($data->idValoracionFuncional->idHistoriaGYM->idVUsuario)'),
		'fecha_creacion',
		'objetivo',
		'tipo_trabajo',
		//'saludable',
		//'recomendaciones',
		/*
		'idValoracion_funcional',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{update}'
		),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
				'type'=>'primary',
	            'icon'=>'white ok',
				'label'=>'Nuevo plan de entrenamiento',
				'url'=>array('create')
	)); 
?>

