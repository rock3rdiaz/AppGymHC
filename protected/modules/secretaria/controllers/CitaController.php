<?php

class CitaController extends Controller
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
				'actions'=>array('create','update', 'ajaxBuscarUsuario'),
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
	 */
	public function actionCreate()
	{
		/*Obtenemos todos los codigos de los empleados que tienen los cargos definidos en el array*/
		$listado_id_empleados = Empleado::model()->getAllEmpleadosPorCargo(array('fisioterapeuta', 'medico general'));
		
		/*Construimos el array con los datos necesarios. 'Codigo usuario'=>'Nombre usuario'*/
		foreach ($listado_id_empleados as $id){
			$listado_empleados[$id->idEmpleado] = Empleado::model()->getNombreCompleto($id->idEmpleado);
		}

		$model = new Cita;
                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cita']))
		{  
            $model->attributes = $_POST['Cita'];
                        
			if($model->save())
				$this->redirect(array('view','id'=>$model->idCita));
		}

		$this->render('create',array(
			'model'=>$model,
			'listado_empleados'=>$listado_empleados
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$listado_id_empleados = Empleado::model()->getAllEmpleadosPorCargo(array('fisioterapeuta', 'medico general'));
				
		foreach ($listado_id_empleados as $i){
			$listado_empleados[$i->idEmpleado] = Empleado::model()->getNombreCompleto($i->idEmpleado);
		}

		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cita']))
		{
			$model->attributes=$_POST['Cita'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idCita));
		}

		$this->render('update',array(
			'model'=>$model,
			'listado_empleados'=>$listado_empleados
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
		$dataProvider=new CActiveDataProvider('Cita');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cita('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cita']))
			$model->attributes=$_GET['Cita'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Cita::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='cita-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * @summary: Metodo ajax que permite buscar el nombre completo del usuario y su codigo dada su cedula, misma que es digitada por el usuario.
	 */
	public function actionAjaxBuscarUsuario(){
		
		$cedula_usuario = $_POST['cedula_usuario'];
		$nombre_usuario = VUsuarios::model()->getNombreCompleto($cedula_usuario, 'identificacion');
		
		if($nombre_usuario != Null){
			echo $nombre_usuario.'|'.VUsuarios::model()->findByAttributes(array('identificacion'=>$cedula_usuario))->id_usuarios;
		}
		else{
			echo 'Usuario no encontrado! :(';
		}
	}
}
