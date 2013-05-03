<?php
$this->breadcrumbs=array(
	'Empleados'=>array('admin'),
	$model->idEmpleado=>array('view','id'=>$model->idEmpleado),
	'Actualizar datos empleados',
);

/*$this->menu=array(
	array('label'=>'List Empleado','url'=>array('index')),
	array('label'=>'Create Empleado','url'=>array('create')),
	array('label'=>'View Empleado','url'=>array('view','id'=>$model->idEmpleado)),
	array('label'=>'Manage Empleado','url'=>array('admin')),
);*/

$this->items_menu_principal = array(
        array('label'=>'OPCIONES GENERALES'),
        array('label'=>'Inicio', 'icon'=>'home', 'url'=>array('default/index'), 'active'=>true),
        array('label'=>'Empleados', 'icon'=>'user', 'url'=>array('empleado/admin')),
        array('label'=>'Cargos', 'icon'=>'pencil', 'url'=>array('cargo/admin')),
        array('label'=>'INFORMES'),
        array('label'=>'Estadisticas', 'icon'=>'book', 'url'=>'#'),
    );
?>

<h1 class="h1_titulos_acciones">Actuaizaci&oacute;n de datos del empleado <?php echo $model->idEmpleado; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>