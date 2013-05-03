<?php
$this->breadcrumbs=array(
	'Administracion Evaluacion Medicas'=>array('admin'),
	'Administracion',
);

/*$this->menu=array(
	array('label'=>'List EvaluacionMedica','url'=>array('index')),
	array('label'=>'Create EvaluacionMedica','url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('evaluacion-medica-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="h1_titulos_acciones">Administraci&oacute;n de evaluaciones m&eacute;dicas</h1>

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
	'id'=>'evaluacion-medica-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'idEvaluacion_medica',
		array('header'=>'Nombre usuario',
			'value'=>'VUsuarios::model()->getNombreCompleto($data->idHistoriaGYM->idVUsuario)'),
		'enfermedad_actual',
		'fecha_hora',
		'idHistoria_GYM',
		array('header'=>'Estado', 'value'=>'ucfirst($data->idHistoriaGYM->estado)'),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{update}'
		),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
				'type'=>'primary',
	            'icon'=>'white ok',
				'label'=>'Nueva evaluacion medica',
				'url'=>array('create')
	)); 
?>
