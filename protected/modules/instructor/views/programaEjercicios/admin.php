<?php
$this->breadcrumbs=array(
	'Programa de Ejercicios'=>array('admin'),
	'Administracion',
);

/*$this->menu=array(
	array('label'=>'List ProgramaEjercicios','url'=>array('index')),
	array('label'=>'Create ProgramaEjercicios','url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('programa-ejercicios-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="h1_titulos_acciones">Administraci&oacute;n de los programas de ejercicios</h1>

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
	'id'=>'programa-ejercicios-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'idPrograma_ejercicios',
		'fecha_realizacion',
		'observaciones',
		'idPlan_entrenamiento',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
				'type'=>'primary',
	            'icon'=>'white ok',
				'label'=>'Nuevo programa de ejercicio',
				'url'=>array('create')
	)); 
?>
