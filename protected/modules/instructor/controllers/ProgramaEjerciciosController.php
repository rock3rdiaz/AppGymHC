<?php

class ProgramaEjerciciosController extends Controller
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
				'actions'=>array('admin','delete', 'imprimirPlanEntrenamiento'),
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
		$model = new ProgramaEjercicios();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		

		if(isset($_POST['ProgramaEjercicios']))
		{
			$datos_ejercicios = CJSON::decode($_POST['datos_programa_ejercicio']);


			$model->attributes=$_POST['ProgramaEjercicios'];
			$model->fecha_realizacion = date('Y-m-d H:i:s');

			if($model->save()){
				if(count($datos_ejercicios) > 0){					

					foreach($datos_ejercicios as $dato){ 
						$model_rutina = new Rutina();
						
						$model_rutina->Programa_ejercicios_idPrograma_ejercicios = $model->getPrimaryKey();
						$model_rutina->Ejercicio_idEjercicios                    = $dato['idEjercicio'];
						$model_rutina->dia                                       = $dato['dia'];
						$model_rutina->series                                    = $dato['series'];
						$model_rutina->repeticiones                              = $dato['repeticiones'];

						$model_rutina->save();
					}
				}
				$this->redirect(array('view','id'=>$model->idPrograma_ejercicios));
			}		
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}




	/**
	 * @summary: Accion que permite imprimir los datos del plan de entrenamiento al que se desea asociar el programa de ejercicios seleccionado por el usuario.
	 * @param  [int] $id_plan_entrenamiento [Id del plan de entrenamiento seleccionado]
	 * @return Null
	 */
	public function actionImprimirPlanEntrenamiento($id_plan_entrenamiento){		
		
		$res = Yii::app()->db->createCommand("exec getPlanEntrenamiento '$id_plan_entrenamiento'")->queryRow();
		
		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		
		$pdf->subTitulo("Datos generales");
		$pdf->mostrarEnCol(0, "Codigo del usuario");
		$pdf->mostrarEnCol(1, $res['id_usuarios']);
		$pdf->ln(5);
		$pdf->mostrarEnCol(0, "Nombre completo");
		$pdf->mostrarEnCol(1, VUsuarios::model()->getNombreCompleto($res['id_usuarios']));
		$pdf->ln(5);
		$pdf->mostrarEnCol(0, "Identificacion");
		$pdf->mostrarEnCol(1, number_format($res['identificacion'], 0, ',', '.'));
		$pdf->ln(5);
		$pdf->mostrarEnCol(0, "Objetivo");
		$pdf->mostrarEnCol(1, ucfirst($res['objetivo']));
		$pdf->ln(5);
		$pdf->mostrarEnCol(0, "Fecha realizacion del plan");
		$pdf->mostrarEnCol(1, ucfirst($res['fecha_creacion']));	

		$pdf->ln(10);
		$pdf->setCol(0);

		$pdf->subTitulo("Trabajo cardiovascular");	
		$pdf->mostrarEnCol(0, "Continuo");
		$pdf->mostrarEnCol(1, $res['continuo'].' minutos');
		$pdf->ln(5);
		$pdf->mostrarEnCol(0, "Intervalo");
		$pdf->mostrarEnCol(1, $res['intervalo'].' minutos');
		$pdf->ln(5);
		$pdf->mostrarEnCol(0, "Circuito en estaciones");
		$pdf->mostrarEnCol(1, $res['circuito_estaciones'].' minutos');
		$pdf->ln(5);
		$pdf->mostrarEnCol(0, "Categoria");
		$pdf->mostrarEnCol(1, ucfirst($res['categoria']));

		$pdf->ln(10);
		$pdf->setCol(0);

		$pdf->subTitulo("Trabajo de estiramiento");	
		$pdf->mostrarEnCol(0, "Nivel");
		$pdf->mostrarEnCol(1,  ucfirst($res['nivel']));
		$pdf->ln(5);
		$pdf->mostrarEnCol(0, "Retracciones musculares");
		$pdf->mostrarEnCol(1, $res['retracciones_musculares']);
		$pdf->ln(5);
		$pdf->mostrarEnCol(0, "Series");
		$pdf->mostrarEnCol(1, $res['series']);
		$pdf->ln(5);
		$pdf->mostrarEnCol(0, "Segundos");
		$pdf->mostrarEnCol(1, $res['segundos']);

		$pdf->ln(10);
		$pdf->setCol(0);

		$pdf->subTitulo("Clases grupales");	
		$pdf->mostrarEnCol(0, "Aerobicos basico");
		$pdf->mostrarEnCol(1,  ucfirst($res['aerobicos_basico']));
		$pdf->mostrarEnCol(2, "Aerobicos instructor");
		$pdf->mostrarEnCol(3, ucfirst($res['aerobicos_instructor']));
		$pdf->ln(5);
		$pdf->mostrarEnCol(0, "Ciclismo bajo techo");
		$pdf->mostrarEnCol(1,  ucfirst($res['ciclismo_bajo_techo']));
		$pdf->mostrarEnCol(2, "Danzika");
		$pdf->mostrarEnCol(3, ucfirst($res['danzika']));
		$pdf->ln(5);
		$pdf->mostrarEnCol(0, "Fit cross");
		$pdf->mostrarEnCol(1,  ucfirst($res['gap']));
		$pdf->mostrarEnCol(2, "Flexibilidad");
		$pdf->mostrarEnCol(3, ucfirst($res['flexibilidad']));
		$pdf->ln(5);
		$pdf->mostrarEnCol(0, "GAP");
		$pdf->mostrarEnCol(1,  ucfirst($res['gap']));
		$pdf->mostrarEnCol(2, "Localidad ABD");
		$pdf->mostrarEnCol(3, ucfirst($res['localidad_abd']));
		$pdf->ln(5);
		$pdf->mostrarEnCol(0, "Mancuerna");
		$pdf->mostrarEnCol(1,  ucfirst($res['mancuerna']));
		$pdf->mostrarEnCol(2, "Master class");
		$pdf->mostrarEnCol(3, ucfirst($res['master_class']));
		$pdf->ln(5);
		$pdf->mostrarEnCol(0, "Pilates");
		$pdf->mostrarEnCol(1,  ucfirst($res['pilates']));
		$pdf->mostrarEnCol(2, "Step");
		$pdf->mostrarEnCol(3, ucfirst($res['step']));

		$pdf->ln(10);
		$pdf->setCol(0);

		$pdf->Output('Plan de entrenamiento No '.$id_plan_entrenamiento.'.pdf', 'I');
		

		/*$this->widget('ext.PdfGrid.EPDFGrid', array(
		    'id'        => 'informe-pdf',
		    'fileName'  => 'Informe en PDF',//Nombre del archivo generado sin la extension pdf (.pdf)
		    'dataProvider'  => $model->search(), //puede ser $model->search()
		    'columns'   => array(
		        'idPlan_entrenamiento',
		        'fecha_creacion',
		        'objetivo',
		        'tipo_trabajo',
		        'saludable',
		        'recomendaciones',
		        'idValoracion_funcional',
		        /*array(
		            'name'  => 'columnName4',
		            'value' => '$data->relationName->value',
		        ),
		    ),
		    'config'    => array(
		        'title'     => 'Centro de acondicionamiento y preparacion fisica CAF',
		        'subTitle'=>'Plan de entrenamiento',
		        'colWidths' => array(10, 20, 40, 70),
		        'showLogo'=>true,
		        'imagePath'=>'images/logocomfenalco.jpg',
		    ),
		));*/

	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProgramaEjercicios']))
		{
			$model->attributes=$_POST['ProgramaEjercicios'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idPrograma_ejercicios));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('ProgramaEjercicios');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProgramaEjercicios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProgramaEjercicios']))
			$model->attributes=$_GET['ProgramaEjercicios'];

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
		$model=ProgramaEjercicios::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='programa-ejercicios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
