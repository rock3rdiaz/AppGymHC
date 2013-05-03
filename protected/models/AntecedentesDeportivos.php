<?php

/**
 * This is the model class for table "antecedentes_deportivos".
 *
 * The followings are the available columns in table 'antecedentes_deportivos':
 * @property integer $idAntecedentes_deportivos
 * @property string $frecuencia_practica
 * @property string $lateralidad
 * @property string $tipo_practica
 * @property string $practica_si_no
 * @property string $posicion_juego
 * @property string $observaciones
 * @property integer $idDeporte
 * @property integer $idEvaluacion_medica
 *
 * The followings are the available model relations:
 * @property Deporte $idDeporte0
 * @property EvaluacionMedica $idEvaluacionMedica
 */
class AntecedentesDeportivos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AntecedentesDeportivos the static model class
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
		return 'antecedentes_deportivos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lateralidad, practica_si_no, idEvaluacion_medica', 'required'),
			array('idDeporte, idEvaluacion_medica', 'numerical', 'integerOnly'=>true),
			array('frecuencia_practica, posicion_juego', 'length', 'max'=>20),
			array('lateralidad, tipo_practica', 'length', 'max'=>15),
			array('practica_si_no', 'length', 'max'=>10),
			array('observaciones', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idAntecedentes_deportivos, frecuencia_practica, lateralidad, tipo_practica, practica_si_no, posicion_juego, observaciones, idDeporte, idEvaluacion_medica', 'safe', 'on'=>'search'),
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
			'idDeporte0' => array(self::BELONGS_TO, 'Deporte', 'idDeporte'),
			'idEvaluacionMedica' => array(self::BELONGS_TO, 'EvaluacionMedica', 'idEvaluacion_medica'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAntecedentes_deportivos' => 'Id Antecedentes Deportivos',
			'frecuencia_practica' => 'Frecuencia Practica',
			'lateralidad' => 'Lateralidad',
			'tipo_practica' => 'Tipo Practica',
			'practica_si_no' => 'Practica Si No',
			'posicion_juego' => 'Posicion Juego',
			'observaciones' => 'Observaciones',
			'idDeporte' => 'Id Deporte',
			'idEvaluacion_medica' => 'Id Evaluacion Medica',
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

		$criteria->compare('idAntecedentes_deportivos',$this->idAntecedentes_deportivos);
		$criteria->compare('frecuencia_practica',$this->frecuencia_practica,true);
		$criteria->compare('lateralidad',$this->lateralidad,true);
		$criteria->compare('tipo_practica',$this->tipo_practica,true);
		$criteria->compare('practica_si_no',$this->practica_si_no,true);
		$criteria->compare('posicion_juego',$this->posicion_juego,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('idDeporte',$this->idDeporte);
		$criteria->compare('idEvaluacion_medica',$this->idEvaluacion_medica);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}