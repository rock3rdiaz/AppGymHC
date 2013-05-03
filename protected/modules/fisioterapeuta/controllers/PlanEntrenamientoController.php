<?php

class PlanEntrenamientoController extends Controller
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
				'actions'=>array('create','update', 'ajaxBuscarAntecedentesImportantes'),
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
	 * @summary: Metodo que permite realizar la construccion de un plan de entrenamiento. Para llevar a cabo esto se hace necesario
	 * almacenar los datos procedientes del formulario en las tablas:
	 * 'plan_entrenamiento',
	 * 'trabajo_cardiovascular',
	 * 'trabajo_estiramiento',
	 * 'clases_grupales'.
	 * 
	 * Los nombres de los modelos son iguales a los nombres de las tablas que representan.
	 * 
	 * Se sigue la logica ya explicada para almacenar tanto las valoraciones funcionales como los examenes medicos.
	 */
	public function actionCreate()
	{
		$model                        = new PlanEntrenamiento();//Model principal		
		$model_trabajo_cardiovascular = new TrabajoCardiovascular();
		$model_trabajo_estiramiento   = new TrabajoEstiramiento();
		$model_clases_grupales        = new ClasesGrupales();

		/*Construimos el array que albergara los nombres de todos los empleados cuyo cargo es 'instructor'*/
		$result = Empleado::model()->getAllEmpleadosPorCargo(array('instructor'));
		if(count($result) != 0){
			foreach($result as $instructor){
				$listado_instructores[$instructor->idEmpleado] = Empleado::model()->getNombreCompleto($instructor->idEmpleado); 
			}
		}
		else{
			$listado_instructores = array();
		}
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PlanEntrenamiento'],
			$_POST['TrabajoEstiramiento'],
			$_POST['TrabajoCardiovascular'],
			$_POST['ClasesGrupales'])){

				$model->attributes                        = $_POST['PlanEntrenamiento'];
				$model->fecha_creacion                    = date('Y-m-d H:i:s');
				
				$model_trabajo_cardiovascular->attributes = $_POST['TrabajoCardiovascular'];
				$model_trabajo_estiramiento->attributes   = $_POST['TrabajoEstiramiento'];
				$model_clases_grupales->attributes        = $_POST['ClasesGrupales'];

				$model->save();

				$model_trabajo_cardiovascular->idPlan_entrenamiento = $model->idPlan_entrenamiento;
				$model_trabajo_estiramiento->idPlan_entrenamiento   = $model->idPlan_entrenamiento;
				$model_clases_grupales->idPlan_entrenamiento        = $model->idPlan_entrenamiento;

				if($model_trabajo_cardiovascular->validate() &&
					$model_trabajo_estiramiento->validate() &&
					$model_clases_grupales->validate()){

						$model_trabajo_cardiovascular->save(false);
						$model_trabajo_estiramiento->save(false);
						$model_clases_grupales->save(false);

						$this->redirect(array('view','id'=>$model->idPlan_entrenamiento));
				}
				else{
					if($model->validate()){
						$model->delete($model->getPrimaryKey());
					}
				}
		}

		$this->render('create',array(
			'model'=>$model,
			'listado_instructores'=>$listado_instructores,//Array que contiene le nombre de todos los instructores
			'model_trabajo_cardiovascular'=>$model_trabajo_cardiovascular,
			'model_trabajo_estiramiento'=>$model_trabajo_estiramiento,
			'model_clases_grupales'=>$model_clases_grupales
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model                        = $this->loadModel($id);
		$model_trabajo_cardiovascular = $this->loadModel(TrabajoCardiovascular::model()->findByAttributes(array('idPlan_entrenamiento'=>$model->idPlan_entrenamiento))->getPrimaryKey(), 'TrabajoCardiovascular');
		$model_trabajo_estiramiento   = $this->loadModel(TrabajoEstiramiento::model()->findByAttributes(array('idPlan_entrenamiento'=>$model->idPlan_entrenamiento))->getPrimaryKey(), 'TrabajoEstiramiento');
		$model_clases_grupales        = $this->loadModel(ClasesGrupales::model()->findByAttributes(array('idPlan_entrenamiento'=>$model->idPlan_entrenamiento))->getPrimaryKey(), 'ClasesGrupales');

		/*Construimos el array que albergara los nombres de todos los empleados cuyo cargo es 'instructor'*/
		$result = Empleado::model()->getAllEmpleadosPorCargo(array('instructor'));
		if(count($result) != 0){
			foreach($result as $instructor){
				$listado_instructores[$instructor->idEmpleado] = Empleado::model()->getNombreCompleto($instructor->idEmpleado); 
			}
		}
		else{
			$listado_instructores = array();
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PlanEntrenamiento'], 
			$_POST['TrabajoCardiovascular'], 
			$_POST['TrabajoEstiramiento'], 
			$_POST['ClasesGrupales'])){

				$model->attributes                        = $_POST['PlanEntrenamiento'];
				$model_trabajo_cardiovascular->attributes = $_POST['TrabajoCardiovascular'];
				$model_trabajo_estiramiento->attributes   = $_POST['TrabajoEstiramiento'];
				$model_clases_grupales->attributes        = $_POST['ClasesGrupales'];

				if($model->update() &&
					$model_trabajo_cardiovascular->update() &&
					$model_trabajo_estiramiento->update() &&
					$model_clases_grupales->update()){

						$this->redirect(array('view','id'=>$model->idPlan_entrenamiento));
				}
		}

		$this->render('update',array(
			'model'=>$model,
			'listado_instructores'=>$listado_instructores,
			'model_trabajo_cardiovascular'=>$model_trabajo_cardiovascular,
			'model_trabajo_estiramiento'=>$model_trabajo_estiramiento,
			'model_clases_grupales'=>$model_clases_grupales
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
		$dataProvider=new CActiveDataProvider('PlanEntrenamiento');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PlanEntrenamiento('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PlanEntrenamiento']))
			$model->attributes=$_GET['PlanEntrenamiento'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id, $modelo = 'PlanEntrenamiento')
	{
		$model=$modelo::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='plan-entrenamiento-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * @summary: Metodo Ajax que retorna los datos definidos por el formato de plan de entrenamiento.
	 * 			Captura desde la peticion ajax el id de una valoracion funcional. Recoredemos que la valoracion funcional debe tener 
	 *    		un plan de entrenamiento asociado.
	 */
	public function actionAjaxBuscarAntecedentesImportantes(){
		$id_valoracion_funcional = $_POST['id_valoracion_funcional'];

		/*Invocamos el procedimiento almacenado que nos devolvera los datos solicitados*/
		$result = Yii::app()->db->createCommand("execute getDatosImportantesPlanEntrenamiento '$id_valoracion_funcional'")->queryAll();
		//$result = HistoriaGYM::model()->getAllAntecedentesPlanEntrenamiento($id_valoracion_funcional);		

		echo json_encode($result);		
	}
}
