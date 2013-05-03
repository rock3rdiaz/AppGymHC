<?php

/**
 * This is the model class for table "empleado".
 *
 * The followings are the available columns in table 'empleado':
 * @property integer $idEmpleado
 * @property string $nombres
 * @property string $apellidos
 * @property integer $idCargo
 * @property integer $Profesion_idProfesion
 * @property string $login
 * @property string $pass
 *
 * The followings are the available model relations:
 * @property Cita[] $citas
 * @property Cargo $idCargo0
 * @property Profesion $profesionIdProfesion
 * @property PlanEntrenamiento[] $planEntrenamientos
 */
class Empleado extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Empleado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empleado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombres, apellidos, idCargo, Profesion_idProfesion, login, pass', 'required'),
			array('idCargo, Profesion_idProfesion', 'numerical', 'integerOnly'=>true),
			array('nombres, apellidos, login, pass', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idEmpleado, nombres, apellidos, idCargo, Profesion_idProfesion, login, pass', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'citas' => array(self::HAS_MANY, 'Cita', 'Empleado_idEmpleado'),
			'idCargo0' => array(self::BELONGS_TO, 'Cargo', 'idCargo'),
			'profesionIdProfesion' => array(self::BELONGS_TO, 'Profesion', 'Profesion_idProfesion'),
			'planEntrenamientos' => array(self::HAS_MANY, 'PlanEntrenamiento', 'idEmpleado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEmpleado' => 'Id Empleado',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'idCargo' => 'Id Cargo',
			'Profesion_idProfesion' => 'Profesion Id Profesion',
			'login' => 'Login',
			'pass' => 'Pass',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idEmpleado',$this->idEmpleado);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('idCargo',$this->idCargo);
		$criteria->compare('Profesion_idProfesion',$this->Profesion_idProfesion);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('pass',$this->pass,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @summary: Metodo que retorna el nombre completo del empleado
	 * @param  [int] $id_usuario [Pk del empleado]
	 * @return [string]          [Nombre completo del usuario]
	 */
	public function getNombreCompleto($id_usuario){
		return $this->findByPk($id_usuario)->nombres.' '.$this->findByPk($id_usuario)->apellidos;
	}


	/**
	 * @summary: Metodo que permite obtener todos los empleados que pertenecen a uno o varios cargos.
	 * @param  [array] $cargos [Lista de cargos que permiten realizar el filtrado de los empleados]
	 * @return [array] $datos  [Array que contiene los datos solicitados]
	 */
	public function getAllEmpleadosPorCargo($cargos){
		$criteria = new CDbCriteria();

		$criteria->select = 'idEmpleado';
		$criteria->join = 'inner join cargo as c on t.idCargo = c.idCargo';		
		$criteria->addInCondition('c.nombre', $cargos, 'AND');

		$data_provider = new CActiveDataProvider($this, array('criteria'=>$criteria));

		return $data_provider->getData();
	}
}