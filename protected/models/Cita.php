<?php

/**
 * This is the model class for table "cita".
 *
 * The followings are the available columns in table 'cita':
 * @property integer $idCita
 * @property string $tipo
 * @property string $fecha
 * @property string $motivo
 * @property integer $Empleado_idEmpleado
 * @property string $estado
 * @property integer $idVUsuario
 *
 * The followings are the available model relations:
 * @property Empleado $empleadoIdEmpleado
 */
class Cita extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cita the static model class
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
		return 'cita';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo, fecha, motivo, Empleado_idEmpleado, estado, idVUsuario', 'required'),
			array('Empleado_idEmpleado, idVUsuario', 'numerical', 'integerOnly'=>true),
			array('tipo, motivo', 'length', 'max'=>20),
			array('estado', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCita, tipo, fecha, motivo, Empleado_idEmpleado, estado, idVUsuario', 'safe', 'on'=>'search'),
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
			'empleadoIdEmpleado' => array(self::BELONGS_TO, 'Empleado', 'Empleado_idEmpleado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCita' => 'Id Cita',
			'tipo' => 'Tipo',
			'fecha' => 'Fecha',
			'motivo' => 'Motivo',
			'Empleado_idEmpleado' => 'Empleado Id Empleado',
			'estado' => 'Estado',
			'idVUsuario' => 'Id Usuario',
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

		$criteria->compare('idCita',$this->idCita);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('motivo',$this->motivo,true);
		$criteria->compare('Empleado_idEmpleado',$this->Empleado_idEmpleado);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('idVUsuario',$this->idVUsuario);

		//$criteria->condition = "estado <> 'efectuada'";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	/*@summary: Funcion que alimenta el calendario con las citas pendientes.*/
	public function getAllCitas(){
		
		/*La construccion del provvedor de datos esta basada en la siguiente consulta:
		 * 'select tipo, nombres, fecha from Cita inner join Usuario on Usuario_idUsuario = Usuario.idUsuario
			where estado = 'pendiente' order by fecha asc;'*/
		

		$criteria = new CDbCriteria();
		$criteria->select = 'idVUsuario, tipo, fecha';
		$criteria->condition = "estado = 'pendiente'";
		
		$data_provider = new CActiveDataProvider($this, array('criteria'=>$criteria));
		
		$arr_citas = $data_provider->getData(true);
		$listado_citas = array();
		
		/*Construimos el array de arrays que servira como datos del calendario*/
		foreach ($arr_citas as $i){

			$inicio = $i['fecha'];

			/*Las citas por 'Valoracion funcional son de 30 minutos', mientras que las 'Evaluaciones medicas' son de 20 minutos*/
			if($i['tipo'] == 'funcional'){
				$final = date('Y-m-d H:i:s', strtotime('+30 minute', strtotime($inicio)));
				$fecha_hora_final = explode(" ", $final);
				$titulo = '-'.$fecha_hora_final[1].' VF '.VUsuarios::model()->getNombreCompleto($i['idVUsuario']);				
			}
			else{
				$final = date('Y-m-d H:i:s', strtotime('+20 minute', strtotime($inicio)));
				$fecha_hora_final = explode(" ", $final);
				$titulo = '-'.$fecha_hora_final[1].' EM '.VUsuarios::model()->getNombreCompleto($i['idVUsuario']);
			}

			$listado_citas[] = array('title'=>$titulo, 
					'start'=>$inicio,
					'end'=>$final,
					'allDay'=>false);					
		}
		
		return $listado_citas;
		 
		/*$events = array(array(
                'title'=> 'Hoy',
                'start'=> '2013-1-12 16:00:00',
        		'end'=> '2013-1-12 16:30:00'
        		),
	    		array(
	    				'title'=> 'Hoy',
	    				'start'=> '2013-1-20',
	    				'end'=> '2013-1-22'
	    		));
		return $events;*/
	}
	
	/**
	 * @summary: Metodo que retorna un array con las citas pendientes para el dia actual
	 * @param  [sting] $tipo [Tipo de cita: 'funcional' o 'medica']
	 * @param  [sting] $estado [Estado de la cita: 'pendiente' o 'efectuada']
	 * @return [array] $lista_citas [Listado de citas del dia actual]
	 */
	public function getCitasDeHoy($tipo, $estado = 'pendiente'){

		/* Construccion del objeto Criteria basado en la siguiente sentencia sql. El argumento '101'
		*  presente en la funcion 'CONVERT' define el formato de salida de la fecha.
		*
		*'SELECT * FROM cita where tipo = 'funcional' and estado = 'pendiente' and fecha between 
			cast(Convert(date,GETDATE(), 101) as char)+' 00:00:00' and 
			cast(Convert(date,GETDATE(), 101) as char)+' 23:59:59' '*/


		$criteria = new CDbCriteria();
		$criteria->select = 'idCita, fecha, idVUsuario, motivo';
		$criteria->condition = "estado = '$estado' and tipo = '$tipo' and fecha between 
								cast(Convert(date,GETDATE(), 101) as char)+' 00:00:00' and 
								cast(Convert(date,GETDATE(), 101) as char)+' 23:59:59'";
		$criteria->order = 'fecha asc';

		$data_provider = new CActiveDataProvider($this, array('criteria'=>$criteria));

		return $data_provider->getData(true);
	}
}