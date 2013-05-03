<?php
$this->breadcrumbs=array(
	'Valoracion Funcional'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ValoracionFuncional','url'=>array('index')),
	array('label'=>'Create ValoracionFuncional','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('valoracion-funcional-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="h1_titulos_acciones">Administraci&oacute;n de valoracion funcional</h1>

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
	'id'=>'valoracion-funcional-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped condensed',
	//'filter'=>$model,
	'columns'=>array(
		'idValoracion_funcional',
		array('header'=>'Usuario', 'value'=>'VUsuarios::model()->getNombreCompleto($data->idHistoriaGYM->idVUsuario)'),
		'objetivo_ejercicio',
		//'observaciones',
		//'fecha_hora',
		'programa_entrenamiento',
		//'idHistoria_GYM',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{update}'
		),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
				'type'=>'primary',
	            'icon'=>'white ok',
				'label'=>'Nueva valoracion funcional',
				'url'=>array('create')
	)); 
?>
