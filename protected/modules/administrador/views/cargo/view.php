<?php
$this->breadcrumbs=array(
	'Administracion cargos'=>array('admin'),
	$model->idCargo,
);
?>

<h1 class="h1_titulos_acciones">Detalle de los datos del cargo No.<?php echo $model->idCargo; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		array('name'=>'idCargo', 'label'=>'C&oacute;digo cargo'),
		array('name'=>'nombre', 'label'=>'Nombre'),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'primary',
			'label'=>'Regresar',
                        'icon'=>'white remove',
                        'url'=>array('admin'),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
                    'label'=>'Crear nuevo cargo',
                    'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size'=>'', // '', 'large', 'small' or 'mini'
                    'url'=>array('create'),
                    'icon'=>'white ok',
)); ?>