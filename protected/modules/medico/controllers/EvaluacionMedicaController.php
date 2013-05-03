<?php

class EvaluacionMedicaController extends Controller
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
			//'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view', 'ajaxGetDatosImpresionDiagnostica'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'ajaxGetDatosImpresionDiagnostica', 'ajaxGetDatosExtraUsuario'),
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
	 * Metodo que permite crear una nuevo examen medico. Este proceso implica utilizar las tablas:
	 * 
	 * Evaluacion_medica,----> Tabla principal 
	 * Antecedentes_deportivos, 
	 * Deporte,
	 * Antecedentes_ginecobstetricos,
	 * Antecedentes_trauma_lesion,
	 * Impresion_diagnostica,
	 * Examen,
	 * Examen_fisico,
	 * Caracteristicas_fisicas,
	 * Medidas_fisicas,
	 * Antecedentes_patologicos,
	 * Antecedentes_patologicos_has_enfermedad,
	 * Enfermedad,
	 * Historia_GYM.
	 * 
	 * Como secuencia establecida, primero se crea un registro de la tabla principal para lo que se hace necesario determinar si el usuario ya posee una historia clinica
	 * activa, si es asi simplemente se realizan las relaciones necesarias; en caso contrario se contruye un nuevo registro en la tabla 'Historia_GYM' y se relacionan,
	 * luego se establecen los valores de las tablas secundarias ya sea mediante el formulario o manualmente y por ultimo se almacenan todos los registrios 
	 * en sus tablas respectivas.
	 * 
	 * ---- @param: No recibe parametros.
	 * 
	 * ---- @return: No retorna valor alguno.
	 */
	public function actionCreate()
	{
            $model = new EvaluacionMedica();
                
            /*Creacion de objetos que mapean registros de las tablas involucradas
            * Cada variable representa un registro de cada tabla. Los nombres de las variables son
            * iguales a los nombres de las tablas que representan.
            */
			$model_antecedentes_deportivos             = new AntecedentesDeportivos(); 
			$model_antecedentes_ginecobstetricos       = new AntecedentesGinecobstetricos();
			$model_antecedentes_trauma_lesion          = new AntecedentesTraumaLesion();			
			$model_impresion_diagnostica               = new ImpresionDiagnostica();			
			//$model_examen                              = new Examen(); 			
			$model_examen_fisico                       = new ExamenFisico();
			$model_caracteristicas_fisicas             = new CaracteristicasFisicas();
			$model_medidas_fisicas                     = new MedidasFisicas();			
			$model_antecedentes_patologicos            = new AntecedentesPatologicos(); 
			//$model_enfermedad                          = new Enfermedad();			
			$model_datos_extra_usuario                 = new DatosExtraUsuario();
            
            // $this->performAjaxValidation($model);
            
            if(isset($_POST['EvaluacionMedica'],
                    $_POST['AntecedentesDeportivos'],                    
                    $_POST['AntecedentesGinecobstetricos'],                    
                    $_POST['AntecedentesTraumaLesion'],                    
                    $_POST['ImpresionDiagnostica'],
                    //$_POST['Examen'],                        
                    $_POST['ExamenFisico'],
                    $_POST['MedidasFisicas'],
                    $_POST['CaracteristicasFisicas'],            		
            		$_POST['AntecedentesPatologicos'],
            		//$_POST['Enfermedad'],
            		$_POST['DatosExtraUsuario'])){

				/*Defino los atributos del registro de la tabla principal 'Evaluacion_medica' ya sea desde el formulario o de manera manual*/
				$model->attributes = $_POST['EvaluacionMedica'];
				$model->fecha_hora = date('Y-m-d H:i:s');//Fecha de la realizacion de la evaluacion
				
				
				
				/*******************************************************************************************************************************
				 * Este fragmento de codigo tiene por objetivo buscar la historia clinica asociada al usuario que esta en cita. Si esta ya
				* existe (puede darse el caso de que se haya creado con la valoracion funcional) se toma el codigo de esta y se le asocia
				* al examen medico mediante su llave foranea 'idHistoria_GYM'.
				* Si la historia medica no existe, se procede a su creacion y posterior asociacion con la evaluacion medica*/
				$id_usuario = $_POST['txt_id_usuario_em'];//Id del usuario que viene desde el formulario
				$id_cita = $_POST['txt_id_cita_em'];//Codigo de la cita actual. Se encecita para acutualizar su estado

				$record_historia_GYM = HistoriaGYM::model()->find('idVUsuario = ?', array($id_usuario));//Almacenamos el registro que posee los datos del usuario en cita.
				
				/*El usuario actual ya posee una historia clinica activa?*/
				if($record_historia_GYM != NULL){
					$model_historia_GYM = HistoriaGYM::model()->findByPk($record_historia_GYM->getPrimaryKey());
					$model->idHistoria_GYM = $record_historia_GYM->idHistoria_GYM;//Si es asi, realizamos la asociacion entre ambas tablas.
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
				$model_antecedentes_deportivos->attributes       = $_POST['AntecedentesDeportivos'];				
				$model_antecedentes_ginecobstetricos->attributes = $_POST['AntecedentesGinecobstetricos'];					
				$model_antecedentes_trauma_lesion->attributes    = $_POST['AntecedentesTraumaLesion'];	
				$model_impresion_diagnostica->attributes         = $_POST['ImpresionDiagnostica'];
				$model_datos_extra_usuario->attributes			 = $_POST['DatosExtraUsuario'];		
				$model_datos_extra_usuario->idVUsuario           = $id_usuario;
				$model_antecedentes_patologicos->attributes      = $_POST['AntecedentesPatologicos'];


				/*Relaciones entre las tablas asociadas en el examen fisico*/
				$model_caracteristicas_fisicas->attributes      = $_POST['CaracteristicasFisicas'];
				$model_caracteristicas_fisicas->save();
				$model_medidas_fisicas->attributes              = $_POST['MedidasFisicas'];
				$model_medidas_fisicas->save();
				$model_examen_fisico->attributes                = $_POST['ExamenFisico'];
				$model_examen_fisico->idCaracteristicas_fisicas = $model_caracteristicas_fisicas->getPrimaryKey();//Relacion 'Examen_fisico'-'Caracteristicas_fisicas'
				$model_examen_fisico->idMedidas_fisicas         = $model_medidas_fisicas->getPrimaryKey();//Relacion 'Examen_fisico'-'Medidas_fisicas'
				
					
				/*Construimos las relaciones mediante las llaves foraneas presentes en cada tabla secundaria y la PK presente en la tabla pricnicipal.*/
				$model_antecedentes_deportivos->idEvaluacion_medica       = $model->getPrimaryKey();
				$model_antecedentes_ginecobstetricos->idEvaluacion_medica = $model->getPrimaryKey();
				$model_antecedentes_trauma_lesion->idEvaluacion_medica    = $model->getPrimaryKey();
				$model_antecedentes_patologicos->idEvaluacion_medica      = $model->getPrimaryKey();
				$model_impresion_diagnostica->idEvaluacion_medica         = $model->getPrimaryKey();
				$model_examen_fisico->idEvaluacion_medica                 = $model->getPrimaryKey();
						
					
					
				/*Validamos todos los campos de los modelos secundarios una vez se ha validado y guardado el modelo principal.*/
				if($model_datos_extra_usuario->validate() &&
					$model_antecedentes_deportivos->validate() &&						
						$model_antecedentes_ginecobstetricos->validate() &&						
						$model_antecedentes_trauma_lesion->validate() &&							
						$model_impresion_diagnostica->validate() &&							
						$model_examen_fisico->validate() &&
						$model_antecedentes_patologicos->validate()){
						
					/*Almacenamos los registros en los modelos respectivos*/
					$model_antecedentes_deportivos->save(false);
					$model_antecedentes_ginecobstetricos->save(false);
					$model_antecedentes_trauma_lesion->save(false);
					$model_impresion_diagnostica->save(false);
					$model_examen_fisico->save(false);					
					$model_antecedentes_patologicos->save(false);

					/*Si el usuario ya posee datos extra asociados a su informacion, solo se actualizaran los campos de ser necesario*/
					if(DatosExtraUsuario::model()->findByAttributes(array('idVUsuario'=>$id_usuario)) == Null){
						$model_datos_extra_usuario->save(false);
					}
					else{
						$model_datos_extra_usuario             = $this->loadModel(DatosExtraUsuario::model()->findByAttributes(array('idVUsuario'=>$id_usuario))->getPrimaryKey(), 'DatosExtraUsuario');
						$model_datos_extra_usuario->attributes = $_POST['DatosExtraUsuario'];	
						$model_datos_extra_usuario->update();	
					}


					/*Segmento de codigo que me permite realizar las relaciones entre las enfermeddes creadas y la tabla 'Antecedentes_patologicos'
					* por medio de la tabla puente. Las enfermedades vienen agrupadas mendiante un objeto json por medio del campo oculto 'lista_emfermedades_asociadas'
					* mismo que se construye desde javascript al agregar enfermedades. La relacion es de N:M
					*/

					$str_enfermedades = $_POST['lista_enfermedades_asociadas'];
					//$listado_enfermedades = json_decode($str_enfermedades);
					$listado_enfermedades = CJSON::decode($str_enfermedades);

					if(count($listado_enfermedades) > 0){
						foreach ($listado_enfermedades as $enfermedad){
							$model_enfermedad = new Enfermedad();
							$model_antecedentes_patologicos_enfermedad = new AntecedentesPatologicosHasEnfermedad();

							$model_enfermedad->descripcion = $enfermedad->descripcion;
							$model_enfermedad->tipo        = $enfermedad->tipo;
							$model_enfermedad->save();

							$model_antecedentes_patologicos_enfermedad->Antecedentes_patologicos_idAntecedentes_patologicos = $model_antecedentes_patologicos->getPrimaryKey();
							$model_antecedentes_patologicos_enfermedad->Enfermedad_idEnfermedad = $model_enfermedad->getPrimaryKey();
							$model_antecedentes_patologicos_enfermedad->save();
						}
					}

					

					/*Actualizamos el estado de la cita que ha sido ejecutada*/
               		$model_cita = Cita::model()->find('idCita = ?', array($id_cita)); 
               		$model_cita->estado = 'efectuada';
               		$model_cita->update();   

               		$this->redirect(array('view','id'=>$model->idEvaluacion_medica));            				
					
				}
				/*Si se ha presentado algun error en los modelos secundarios, deben eliminarse los registros de las tablar terciarias.*/
				else{
					$model->deleteByPk($model->getPrimaryKey());

					$model_caracteristicas_fisicas->deleteByPk($model_caracteristicas_fisicas->getPrimaryKey());
					$model_medidas_fisicas->deleteByPk($model_medidas_fisicas->getPrimaryKey());

					/*Eliminamos la historia clinica creada si se ha presentado un problema al validar el modelo principal*/
					if($record_historia_GYM == NULL){
						$model_historia_GYM->deleteByPk($model_historia_GYM->getPrimaryKey());
					}
				}
			}

		     $this->render('create', array('model'=>$model,		     		
                    'model_antecedentes_deportivos'=>$model_antecedentes_deportivos,		     		
                    'model_antecedentes_ginecobstetricos'=>$model_antecedentes_ginecobstetricos,                    
                    'model_impresion_diagnostica'=>$model_impresion_diagnostica,
                    //'model_impresion_diagnostica_examen'=>$model_impresion_diagnostica_examen,Tabla puente
                    //'model_examen'=>$model_examen,	                    
                    'model_examen_fisico'=>$model_examen_fisico,
                    'model_caracteristicas_fisicas'=>$model_caracteristicas_fisicas,
                    'model_medidas_fisicas'=>$model_medidas_fisicas,                    
                    'model_antecedentes_trauma_lesion'=>$model_antecedentes_trauma_lesion,                    
                    'model_antecedentes_patologicos'=>$model_antecedentes_patologicos,                    
                    //'model_antecedentes_patologicos_enfermedad'=>$model_antecedentes_patologicos_enfermedad,
                    //'model_enfermedad'=>$model_enfermedad,  
                    'model_datos_extra_usuario'=>$model_datos_extra_usuario
                ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		$model_antecedentes_deportivos       = $this->loadModel(AntecedentesDeportivos::model()->findByAttributes(array('idEvaluacion_medica'=>$model->getPrimaryKey()))->idAntecedentes_deportivos, 'AntecedentesDeportivos'); 
		$model_antecedentes_ginecobstetricos = $this->loadModel(AntecedentesGinecobstetricos::model()->findByAttributes(array('idEvaluacion_medica'=>$model->getPrimaryKey()))->idAntecedentes_ginecobstetricos, 'AntecedentesGinecobstetricos');
		$model_antecedentes_trauma_lesion    = $this->loadModel(AntecedentesTraumaLesion::model()->findByAttributes(array('idEvaluacion_medica'=>$model->getPrimaryKey()))->idAntecedentes_trauma_lesion, 'AntecedentesTraumaLesion');	
		$model_impresion_diagnostica         = $this->loadModel(ImpresionDiagnostica::model()->findByAttributes(array('idEvaluacion_medica'=>$model->getPrimaryKey()))->idImpresion_diagnostica, 'ImpresionDiagnostica');
		
		$model_examen_fisico                 = $this->loadModel(ExamenFisico::model()->findByAttributes(array('idEvaluacion_medica'=>$model->getPrimaryKey()))->idExamen_fisico, 'ExamenFisico');
		$model_caracteristicas_fisicas       = $this->loadModel(CaracteristicasFisicas::model()->findByAttributes(array('idCaracteristicas_fisicas'=>$model_examen_fisico->idCaracteristicas_fisicas))->idCaracteristicas_fisicas, 'CaracteristicasFisicas');
		$model_medidas_fisicas               = $this->loadModel(MedidasFisicas::model()->findByAttributes(array('idMedidas_fisicas'=>$model_examen_fisico->idMedidas_fisicas))->idMedidas_fisicas, 'MedidasFisicas');		

		$model_antecedentes_patologicos      = $this->loadModel(AntecedentesPatologicos::model()->findByAttributes(array('idEvaluacion_medica'=>$model->getPrimaryKey()))->idAntecedentes_patologicos, 'AntecedentesPatologicos');
		
		$id_usuario = HistoriaGYM::model()->findByAttributes(array('idHistoria_GYM'=>$model->idHistoria_GYM))->idVUsuario;
		$model_datos_extra_usuario           = $this->loadModel(DatosExtraUsuario::model()->findByAttributes(array('idVUsuario'=>$id_usuario))->idDatos_extra_usuario, 'DatosExtraUsuario');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EvaluacionMedica'], 
			$_POST['AntecedentesDeportivos'], 
			$_POST['AntecedentesGinecobstetricos'], 
			$_POST['AntecedentesTraumaLesion'],
			$_POST['ImpresionDiagnostica'],
			$_POST['ExamenFisico'], 
			$_POST['CaracteristicasFisicas'],
			$_POST['MedidasFisicas'], 
			$_POST['DatosExtraUsuario']))
		{
			$model->attributes                               = $_POST['EvaluacionMedica'];
			$model_antecedentes_deportivos->attributes       = $_POST['AntecedentesDeportivos'];
			$model_antecedentes_ginecobstetricos->attributes = $_POST['AntecedentesGinecobstetricos'];
			$model_antecedentes_trauma_lesion->attributes    = $_POST['AntecedentesTraumaLesion'];
			$model_impresion_diagnostica->attributes         = $_POST['ImpresionDiagnostica'];
			$model_examen_fisico->attributes                 = $_POST['ExamenFisico'];
			$model_caracteristicas_fisicas->attributes       = $_POST['CaracteristicasFisicas'];
			$model_medidas_fisicas->attributes               = $_POST['MedidasFisicas'];
			$model_antecedentes_patologicos->attributes      = $_POST['AntecedentesPatologicos'];
			$model_datos_extra_usuario->attributes           = $_POST['DatosExtraUsuario'];
			

			if($model->update() &&
				$model_antecedentes_deportivos->update() &&
				$model_antecedentes_ginecobstetricos->update() &&
				$model_antecedentes_trauma_lesion->update() &&
				$model_impresion_diagnostica->update() &&
				$model_examen_fisico->update() &&
				$model_caracteristicas_fisicas->update() &&
				$model_medidas_fisicas->update() &&
				$model_antecedentes_patologicos->update() &&
				$model_datos_extra_usuario->update()){

					$this->redirect(array('view','id'=>$model->idEvaluacion_medica));
			}
				
		}		

		$this->render('update', array('model'=>$model,						     		
                    'model_antecedentes_deportivos'=>$model_antecedentes_deportivos,		     		
                    'model_antecedentes_ginecobstetricos'=>$model_antecedentes_ginecobstetricos,                    
                    'model_impresion_diagnostica'=>$model_impresion_diagnostica,
                    //'model_impresion_diagnostica_examen'=>$model_impresion_diagnostica_examen,Tabla puente
                    //'model_examen'=>$model_examen,	                    
                    'model_examen_fisico'=>$model_examen_fisico,
                    'model_caracteristicas_fisicas'=>$model_caracteristicas_fisicas,
                    'model_medidas_fisicas'=>$model_medidas_fisicas,                    
                    'model_antecedentes_trauma_lesion'=>$model_antecedentes_trauma_lesion,                    
                    'model_antecedentes_patologicos'=>$model_antecedentes_patologicos,                    
                    //'model_antecedentes_patologicos_enfermedad'=>$model_antecedentes_patologicos_enfermedad,
                    //'model_enfermedad'=>$model_enfermedad,  
                    'model_datos_extra_usuario'=>$model_datos_extra_usuario
                ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('EvaluacionMedica');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EvaluacionMedica('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EvaluacionMedica']))
			$model->attributes=$_GET['EvaluacionMedica'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id, $model = 'EvaluacionMedica')
	{
		$model = $model::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='evaluacion-medica-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * @summary: Metodo que permite retornar los datos asociados a la impresion diagnostica de los usuarios. Se consulta via AJAX.
	 * 			 Dado el id del usuario, se buscan los datos de la tabla 'impresion_diagnostica' mediante las relaciones.
	 *           Para mas detalle, observar el diseño ER del aplicativo.
	 * @param  [int] [Id del usuario, se captura medinate el POST]
	 * @return [string] [Datos de la impresion diagnostica del usuario. Mediante js se procesan los datos concatenados]
	 */
	public function actionAjaxGetDatosImpresionDiagnostica(){
		$id_usuario = $_POST['id_usuario'];//Capturo el id del usuario enviado desde js

		/*Obtengo el id de la historia clinica del usuario*/
		$id_historia_gym = HistoriaGYM::model()->findByAttributes(array('idVUsuario'=>$id_usuario));

		if($id_historia_gym != Null){
			/*Obtengo el id de la evaluacion medica cuyo id de historia clinica sea el del usuario actual*/
			$id_evaluacion_medica = EvaluacionMedica::model()->findAllByAttributes(array('idHistoria_GYM'=>$id_historia_gym['idHistoria_GYM']));
			
			/*Tamaño del array de datos devuelto por la consulta sobre las evaluaciones medicas.
			* Util para establecer como sub-indice SOLO LA ULTIMA evaluacion medica, si es que el usuario tuviese varias.
			*/
			$index_evaluacion_medica = count($id_evaluacion_medica) - 1;

			if($id_evaluacion_medica != Null){
				/*Obtengo los datos necesarios haciendo uso del modelo*/
				$datos_impresion_diagnostica = ImpresionDiagnostica::model()->getAntecedentesDelUsuario($id_evaluacion_medica[$index_evaluacion_medica]['idEvaluacion_medica']);

				/*Construimos la salida de manera que podamos procesarla correctamente desde js.*/
				$antecedentes_usuario = $datos_impresion_diagnostica[0]['riesgo_cardiovascular'] .'|'.$datos_impresion_diagnostica[0]['riesgo_osteomuscular'].'|'.$datos_impresion_diagnostica[0]['conducta'].'|'.$datos_impresion_diagnostica[0]['observaciones'].'|'.$datos_impresion_diagnostica[0]['recomendaciones_nutricionales'].'|'.$datos_impresion_diagnostica[0]['tipo_actividad_fisica'].'|'.$datos_impresion_diagnostica[0]['justificacion_actividad_fisica'];
			
				echo $antecedentes_usuario;	
				//print_r($datos_impresion_diagnostica);				
			}

			else{
				echo 'No hay datos';
			}
		}
		else{
			echo 'No hay datos';
		}
	}


	/**
	 * @summary: Metodo Ajax que permite obtener los datos ectra de un usuario si éstos existieran.
	 * @return [int] [Codigo del usuario]
	 */
	public function actionAjaxGetDatosExtraUsuario(){		
		$id_usuario = $_POST['id_usuario'];
		
		$datos_extra_usuario = DatosExtraUsuario::model()->getDatosExtraUsuario($id_usuario);

		echo CJSON::encode($datos_extra_usuario);//Retornamos la salida como un onjeto JSON		
	}
}
