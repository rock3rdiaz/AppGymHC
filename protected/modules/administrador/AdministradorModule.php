<?php

class AdministradorModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'administrador.models.*',
			'administrador.components.*',
		));
    }

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
                    
                    /*Definimos los items del menu asociados al modulo 'administrador'*/
                    return $controller->items_menu_principal = array(
                            array('label'=>'OPCIONES GENERALES'),
                            array('label'=>'Inicio', 'icon'=>'home', 'url'=>array('default/index'), 'active'=>true),
                            array('label'=>'Cargos', 'icon'=>'pencil', 'url'=>array('cargo/admin')),
                            array('label'=>'Empleados', 'icon'=>'user', 'url'=>array('empleado/admin')),
                            array('label'=>'Profesiones', 'icon'=>'bookmark', 'url'=>array('profesion/admin')),
                            array('label'=>'INFORMES'),
                            array('label'=>'Estadisticas', 'icon'=>'book', 'url'=>'#'),
                    		array('label'=>'SALIR'),
                    		array('label'=>'Salir', 'icon'=>'icon-ban-circle', 'url'=>array('default/logout')),
                    		);
			//return true;
                }
		else
			return false;
	}
}
