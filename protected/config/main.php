<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>' Historia clinica CAF ',
   	'language'=>'es',

	// preloading 'log' component
	'preload'=>array('log',
                    'bootstrap',//Adicion de la extension bootstrap
                    'less'),//Precompilador less

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
                        
                    'generatorPaths'=>array('bootstrap.gii'),//Adicionado para boostrapt
        ),
            /*Modulos agregados a la aplicacion*/
            'administrador',
            'instructor',
            'secretaria',
            'fisioterapeuta',
            'medico',
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
            
                'bootstrap'=>array('class'=>'ext.bootstrap.components.Bootstrap'),//Adicionado para bootstrap
                
                'less'=>array(
                    'class'=>'ext.less.components.LessCompiler',
                    'forceCompile'=>false, // indicates whether to force compiling
                    'paths'=>array(
                        'less/style.less'=>'css/style.css',
                        ),
                ),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
                /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		/*'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=GymHC',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'rog3rs@rd',
			'charset' => 'utf8',
		),*/
	
		'db'=>array(
			'connectionString' => 'sqlsrv:Server=192.168.4.245;Database=Gymhc_test',			
			'username' => 'sa',
			'password' => 'sistemas',
			'charset' => 'utf8',
		),

		/*'db_gymcq'=>array(
			'class'=>'CDbConnection',
			'connectionString' => 'sqlsrv:Server=192.168.4.245;Database=Gymcq',
			'username' => 'sa',
			'password' => 'sistemas',
			'charset' => 'utf8',
		),*/
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				/*array(
					'class'=>'CWebLogRoute',
				),*/
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);