<?php

class FisioterapeutaModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'fisioterapeuta.models.*',
			'fisioterapeuta.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
                        
			
           /*Definimos los items del menu asociados al modulo 'fisioterapeuta'*/
          return $controller->items_menu_principal = array(
                            array('label'=>'OPCIONES GENERALES'),
                            array('label'=>'Inicio', 'icon'=>'home', 'url'=>array('default/index'), 'active'=>true),
                            array('label'=>'Valoracion funcional', 'icon'=>'user', 'url'=>array('valoracionFuncional/admin')),
                            array('label'=>'Plan de entrenamiento', 'icon'=>'icon-signal', 'url'=>array('planEntrenamiento/admin')),
                            array('label'=>'INFORMES'),
                            array('label'=>'Control valoraciones', 'icon'=>'book', 'url'=>'#'),
                            array('label'=>'SALIR'),
                    		array('label'=>'Salir', 'icon'=>'icon-ban-circle', 'url'=>array('default/logout'))
                    		);
                    
                    
                    
		//return true;//Debe existir algun tipo de retorno
		}
		else
			return false;
	}
}
