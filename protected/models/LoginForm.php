<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;

	/*Atributos que definen el perfil y el id del usuario que se loguea en el sistema*/
	private $perfil;
	private $id;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);			
			$this->_identity->authenticate();			
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}

	/**
	 * @summary: Metodo que permite obtener el perfil de un usuario, mismo que esta dado por su cargo.
	 * @return [string] [Nombre del cargo.]
	 */
	public function getPerfil(){
		$this->perfil = Empleado::model()->findByAttributes(array('login'=>$this->username, 'pass'=>$this->password))->idCargo0->nombre;
		return $this->perfil;
	}

	/**
	 * @summary: Metodo que permite obtener el codigo del empleado que se ha registrado en el sistema.
	 * @return [int] [Codigo del empleado recien registrado]
	 */
	public function getId(){
		$this->id = Empleado::model()->findByAttributes(array('login'=>$this->username, 'pass'=>$this->password))->idEmpleado;
		return $this->id;
	}
}
