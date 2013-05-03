<?php

class InstructorModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'instructor.models.*',
			'instructor.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			
                    /*Definimos los items del menu asociados al modulo 'instructor'*/
                    return $controller->items_menu_principal = array(
                            array('label'=>'OPCIONES GENERALES'),
                            array('label'=>'Inicio', 'icon'=>'home', 'url'=>array('default/index'), 'active'=>true),
                            array('label'=>'Ejercicios', 'icon'=>'icon-star', 'url'=>array('ejercicio/admin')),
                            array('label'=>'Programa de ejercicios', 'icon'=>'user', 'url'=>array('programaEjercicios/admin')),
                            array('label'=>'SALIR'),
                    		array('label'=>'Salir', 'icon'=>'icon-ban-circle', 'url'=>array('default/logout'))
                        );
                    
                        //return true;
		}
		else
			return false;
	}
}
