<?php

/**
 * This is the model class for table "rutina".
 *
 * The followings are the available columns in table 'rutina':
 * @property integer $idRutina
 * @property integer $Programa_ejercicios_idPrograma_ejercicios
 * @property integer $Ejercicio_idEjercicios
 * @property string $dia
 * @property integer $series
 * @property integer $repeticiones
 *
 * The followings are the available model relations:
 * @property Ejercicio $ejercicioIdEjercicios
 * @property ProgramaEjercicios $programaEjerciciosIdProgramaEjercicios
 */
class Rutina extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rutina the static model class
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
		return 'rutina';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Programa_ejercicios_idPrograma_ejercicios, Ejercicio_idEjercicios, dia, series, repeticiones', 'required'),
			array('Programa_ejercicios_idPrograma_ejercicios, Ejercicio_idEjercicios, series, repeticiones', 'numerical', 'integerOnly'=>true),
			array('dia', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idRutina, Programa_ejercicios_idPrograma_ejercicios, Ejercicio_idEjercicios, dia, series, repeticiones', 'safe', 'on'=>'search'),
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
			'ejercicioIdEjercicios' => array(self::BELONGS_TO, 'Ejercicio', 'Ejercicio_idEjercicios'),
			'programaEjerciciosIdProgramaEjercicios' => array(self::BELONGS_TO, 'ProgramaEjercicios', 'Programa_ejercicios_idPrograma_ejercicios'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idRutina' => 'Id Rutina',
			'Programa_ejercicios_idPrograma_ejercicios' => 'Programa Ejercicios Id Programa Ejercicios',
			'Ejercicio_idEjercicios' => 'Ejercicio Id Ejercicios',
			'dia' => 'Dia',
			'series' => 'Series',
			'repeticiones' => 'Repeticiones',
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

		$criteria->compare('idRutina',$this->idRutina);
		$criteria->compare('Programa_ejercicios_idPrograma_ejercicios',$this->Programa_ejercicios_idPrograma_ejercicios);
		$criteria->compare('Ejercicio_idEjercicios',$this->Ejercicio_idEjercicios);
		$criteria->compare('dia',$this->dia,true);
		$criteria->compare('series',$this->series);
		$criteria->compare('repeticiones',$this->repeticiones);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}