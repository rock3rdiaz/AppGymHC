<?php

class ValoracionFuncionalController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array(Yii::app()->getSession()->get('username')),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array(Yii::app()->getSession()->get('username')),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * 
	 * ---- @summary: 
	 * Metodo que permite crear una nueva valoracion funcional. Este proceso implica utilizar las tablas:
	 * 
	 * Valoracion_funcional,----> Tabla principal 
	 * Medidas_antropometricas, 
	 * Frecuencia_entrenamiento,
	 * Perimetro,
	 * Pliegue,
	 * Test_funcional,
	 * Antecedentes_usuario,
	 * Historia_GYM.
	 * 
	 * Como secuencia establecida, primero se crea un registro de la tabla principal para lo que se hace necesario determinar si el usuario ya posee una historia clinica
	 * activa, si es asi simplemente se realizan las relaciones necesarias; en caso contrario se contruye un nuevo registro en la tabla 'Historia_GYM' y se relacionan,
	 * luego se establecen los valores de las tablas secundarias ya sea mediante el formulario o manualmente y por ultimo se almacenan todos los registros 
	 * en sus tablas respectivas.
	 * 
	 * ---- @param: No recibe parametros.
	 * 
	 * ---- @return: No retorna valor alguno.
	 */
	public function actionCreate()
	{
		$model                          = new ValoracionFuncional;
		$model_medidas_antropometricas  = new MedidasAntropometricas();
		$model_frecuencia_entrenamiento = new FrecuenciaEntrenamiento();
		$model_perimetro                = new Perimetro();
		$model_pliegue                  = new Pliegue();
		$model_test_funcional           = new TestFuncional();
		$model_antecedentes_usuario     = new AntecedentesUsuario();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ValoracionFuncional'],
                        $_POST['MedidasAntropometricas'],
                        $_POST['FrecuenciaEntrenamiento'],
                        $_POST['Perimetro'],
                        $_POST['Pliegue'],
                        $_POST['TestFuncional'],
                        $_POST['AntecedentesUsuario']                      
                        )){
                   
					/*Definimos los atributos del modelo 'ValoracionFuncional' que no son ingresados directamente
					 * desde el formulario mediante el metodo 'attribute'. Los demas atributos los definimos de manera manual.
					 * */
                    $model->attributes = $_POST['ValoracionFuncional'];                   
                    $model->fecha_hora = date('Y-m-d H:i:s');//Fecha de la realizacion de la valoracion
               		
                    
                    
                    /*******************************************************************************************************************************
                     * Este fragmento de codigo tiene por objetivo buscar la historia clinica asociada al usuario que esta en cita. Si esta ya
                     * existe (puede darse el caso de que se haya creado con la evaluacion medica) se toma el codigo de esta y se le asocia
                     * a la valoracion funcional mediante su llave foranea 'idHistoria_GYM'.
                     * Si la historia medica no existe, se procede a su creacion y posterior asociacion con la valoracion funcional*/
                    $id_usuario = $_POST['txt_id_usuario_vf'];//Id del usuario que viene desde el formulario
                    
					$id_cita = $_POST['txt_id_cita_vf'];//Id de la cita a ejecutar 

                    $record_historia_GYM = HistoriaGYM::model()->find('idVUsuario = ?', array($id_usuario));//Buscamos el registro que posee los datos del usuario en cita.
                    
                    /*El usuario actual ya posee una historia clinica activa?*/
                    if($record_historia_GYM != NULL){
                    	$model_historia_GYM = HistoriaGYM::model()->findByPk($record_historia_GYM->getPrimaryKey());
                    	$model->idHistoria_GYM = $model_historia_GYM->idHistoria_GYM;//Si es asi, realizamos la asociacion entre ambas tablas.                    	
                    }
                    
                    else{
                    	$model_historia_GYM = new HistoriaGYM();//Instanciamos el modelo que representa la tabla 'Historia_GYM'
                    	
                    	/*En caso contrario construimos el objeto y los asociamos por medio de sus PK y FK.*/
                    	$model_historia_GYM->estado = 'activa';
                    	$model_historia_GYM->idVUsuario = $id_usuario;
                    	$model_historia_GYM->save();
                    	 
                    	$model->idHistoria_GYM = $model_historia_GYM->idHistoria_GYM;//Relacion entre ambas tablas
                    }                    
                    /*******************************************************************************************************************************/

                   

                    /*Guardamos el registro del modelo principal. El parametro 'false' elimina la validacion previa.
                     * Se almacena antes de relacionar este modelo con los demas debido a que no se pueden realizar asociaciones entre tablas si el campo principal
                    * de la tabla principal o referenciada no esta almacenado ya en la base de datos.
                    * */
                    $model->save(/*false*/);
                    
                    /*Direccionamos los valores ingresados por medio del formulario a los modelos repectivos (Modelos secundarios).*/
					$model_medidas_antropometricas->attributes  = $_POST['MedidasAntropometricas'];
					$model_frecuencia_entrenamiento->attributes = $_POST['FrecuenciaEntrenamiento'];
					$model_perimetro->attributes                = $_POST['Perimetro'];
					$model_pliegue->attributes                  = $_POST['Pliegue'];
					$model_test_funcional->attributes           = $_POST['TestFuncional'];
					$model_antecedentes_usuario->attributes     = $_POST['AntecedentesUsuario'];
                    
                    /*Construimos las relaciones mediante las llaves foraneas presentes en cada tabla secundaria y la PK presente en la tabla pricnicipal.*/
					$model_antecedentes_usuario->idValoracion_funcional     = $model->idValoracion_funcional;
					$model_frecuencia_entrenamiento->idValoracion_funcional = $model->idValoracion_funcional;
					$model_medidas_antropometricas->idValoracion_funcional  = $model->idValoracion_funcional;
					$model_perimetro->idValoracion_funcional                = $model->idValoracion_funcional;
					$model_pliegue->idValoracion_funcional                  = $model->idValoracion_funcional;
					$model_test_funcional->idValoracion_funcional           = $model->idValoracion_funcional;
                   
               		/*Validamos que los requerimientos presentes en todos los modelos secundarios sean satisfechas*/
               		if($model_antecedentes_usuario->validate() &&
               				$model_medidas_antropometricas->validate() &&
               				$model_pliegue->validate() &&
               				$model_perimetro->validate() &&
               				$model_test_funcional->validate() &&               				
               				$model_frecuencia_entrenamiento->validate()){  
               				
               				$model_antecedentes_usuario->save(false);
               				$model_frecuencia_entrenamiento->save(false);
               				$model_medidas_antropometricas->save(false);
               				$model_perimetro->save(false);
               				$model_pliegue->save(false);
               				$model_test_funcional->save(false);
               				
               				/*Actualizamos el estado de la cita que ha sido ejecutada*/
               				$model_cita = Cita::model()->find('idCita = ?', array($id_cita)); 
               				$model_cita->estado = 'efectuada';
               				$model_cita->update();
               				
               				$this->redirect(array('view','id'=>$model->idValoracion_funcional));
               			} 
               			
               			/*Si se presenta un error al validar todos los modelos, debemos eliminar la historia clinica recien creada.
               			 * Solo se elimina esta si no se ha creado ya con aterioridad.
               			 * */
               			else{
               				/*Eliminamos la valoracion funcional recien creada, puesto que se presentaron errores en los modelos secundarios.*/
               				$model->deleteByPk($model->getPrimaryKey());
               				
               				/*Si esta condicion se cumple, quiere decir que en este controlador se ha creado la historia clinica, por ende debemos eliminarla.*/
               				if($record_historia_GYM == NULL){
               					$model_historia_GYM->deleteByPk($model_historia_GYM->getPrimaryKey());
               				}               				
               			}              			
               			
		}
		$this->render('create',array('model'=>$model,
                    'model_medidas_antropometricas'=>$model_medidas_antropometricas,
                    'model_frecuencia_entrenamiento'=>$model_frecuencia_entrenamiento,
                    'model_perimetro'=>$model_perimetro,
                    'model_pliegue'=>$model_pliegue,
                    'model_test_funcional'=>$model_test_funcional,
                    'model_antecedentes_usuario'=>$model_antecedentes_usuario
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{

		$model=$this->loadModel($id, 'ValoracionFuncional');

		/*Cargo uno a uno todos los modelos involucrados en la valoracion funcional*/
		$id_modelo                      = MedidasAntropometricas::model()->findByAttributes(array('idValoracion_funcional'=>$id))->getPrimaryKey();
		$model_medidas_antropometricas  = $this->loadModel($id_modelo, 'MedidasAntropometricas');
		
		$id_modelo                      = FrecuenciaEntrenamiento::model()->findByAttributes(array('idValoracion_funcional'=>$id))->getPrimaryKey();
		$model_frecuencia_entrenamiento = $this->loadModel($id_modelo, 'FrecuenciaEntrenamiento');
		
		$id_modelo                      = Perimetro::model()->findByAttributes(array('idValoracion_funcional'=>$id))->getPrimaryKey();
		$model_perimetro                = $this->loadModel($id_modelo, 'Perimetro');
		
		$id_modelo                      = Pliegue::model()->findByAttributes(array('idValoracion_funcional'=>$id))->getPrimaryKey();
		$model_pliegue                  = $this->loadModel($id_modelo, 'Pliegue');
		
		$id_modelo                      = TestFuncional::model()->findByAttributes(array('idValoracion_funcional'=>$id))->getPrimaryKey();
		$model_test_funcional           = $this->loadModel($id_modelo, 'TestFuncional');
		
		$id_modelo                      = AntecedentesUsuario::model()->findByAttributes(array('idValoracion_funcional'=>$id))->getPrimaryKey();
		$model_antecedentes_usuario     = $this->loadModel($id_modelo, 'AntecedentesUsuario');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ValoracionFuncional']))
		{
			$model->attributes=$_POST['ValoracionFuncional'];

			$model_medidas_antropometricas->attributes  = $_POST['MedidasAntropometricas'];
			$model_frecuencia_entrenamiento->attributes = $_POST['FrecuenciaEntrenamiento'];
			$model_perimetro->attributes                = $_POST['Perimetro'];
			$model_pliegue->attributes                  = $_POST['Pliegue'];
			$model_test_funcional->attributes           = $_POST['TestFuncional'];
			$model_antecedentes_usuario->attributes     = $_POST['AntecedentesUsuario'];

			if($model->update() && 
				$model_medidas_antropometricas->update() &&
				$model_frecuencia_entrenamiento->update() &&
				$model_perimetro->update() &&
				$model_pliegue->update() &&
				$model_test_funcional->update() &&
				$model_antecedentes_usuario->update()){

					$this->redirect(array('view','id'=>$model->idValoracion_funcional));
			}
				
		}

		$actualizar = 'si';

		$this->render('update',array('model'=>$model,
					'actualizar'=>$actualizar,//Variable que permite realizar algunos cambios en el formulario principal.
                    'model_medidas_antropometricas'=>$model_medidas_antropometricas,
                    'model_frecuencia_entrenamiento'=>$model_frecuencia_entrenamiento,
                    'model_perimetro'=>$model_perimetro,
                    'model_pliegue'=>$model_pliegue,
                    'model_test_funcional'=>$model_test_funcional,
                    'model_antecedentes_usuario'=>$model_antecedentes_usuario
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ValoracionFuncional');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ValoracionFuncional('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ValoracionFuncional']))
			$model->attributes=$_GET['ValoracionFuncional'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 * @param [string] $modelo [Nombre del modelo que desea ser cargado. Esto se realiza de esta manera puesto que la valoracion funcional la componen multiples modelos]
	 */
	public function loadModel($id, $modelo = 'ValoracionFuncional')
	{
		$model = $modelo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='valoracion-funcional-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
