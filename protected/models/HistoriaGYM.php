<?php

/**
 * This is the model class for table "historia_gym".
 *
 * The followings are the available columns in table 'historia_gym':
 * @property integer $idHistoria_GYM
 * @property string $estado
 * @property integer $idVUsuario
 *
 * The followings are the available model relations:
 * @property EvaluacionMedica[] $evaluacionMedicas
 * @property ValoracionFuncional[] $valoracionFuncionals
 * 
 * En este modelo se han adicionado metodos que relacionan muchos modelos. La razon de esto es que este modelo
 * representa la tabla que conecta de manera directa a casi la totalidad de los modelos del aplicativo.
 */
class HistoriaGym extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HistoriaGym the static model class
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
		return 'historia_gym';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estado, idVUsuario', 'required'),
			array('idVUsuario', 'numerical', 'integerOnly'=>true),
			array('estado', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idHistoria_GYM, estado, idVUsuario', 'safe', 'on'=>'search'),
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
			'evaluacionMedicas' => array(self::HAS_MANY, 'EvaluacionMedica', 'idHistoria_GYM'),
			'valoracionFuncionals' => array(self::HAS_MANY, 'ValoracionFuncional', 'idHistoria_GYM'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idHistoria_GYM' => 'Id Historia Gym',
			'estado' => 'Estado',
			'idVUsuario' => 'Id Vusuario',
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

		$criteria->compare('idHistoria_GYM',$this->idHistoria_GYM);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('idVUsuario',$this->idVUsuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @summary: Metodo que permite obtener el codigo de un usuario dando como entrada un codigo de una valoracion funcional o una evaluacion medica.
	 * @param  [string] $tabla [Nombre de la tabla que se relaciona con este modelo]
	 * @param  [string] $campo [Nombre de la llave foranea]
	 * @param  [int] $id_valoracion [Codigo de la valoracion por la que se desea filtrar.]
	 * @return [array] $datos       [Datos arrojados por la consulta]
	 */
	public function getIdUsuario($tabla, $campo, $id_valoracion){
		$criteria = new CDbCriteria();

		$criteria->select = 't.idVUsuario';
		$criteria->condition = "t.idHistoria_GYM = (select idHistoria_GYM from $tabla where $campo = '$id_valoracion')";

		$data_provider = new CActiveDataProvider($this, array('criteria'=>$criteria));

		return $data_provider->getData();
	}
}