<?php

/**
 * This is the model class for table "ejercicio".
 *
 * The followings are the available columns in table 'ejercicio':
 * @property integer $idEjercicio
 * @property string $seccion_trabajo
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property ProgramaEjercicios[] $programaEjercicioses
 */
class Ejercicio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ejercicio the static model class
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
		return 'ejercicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('seccion_trabajo, descripcion', 'required'),
			array('seccion_trabajo', 'length', 'max'=>35),
			array('descripcion', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idEjercicio, seccion_trabajo, descripcion', 'safe', 'on'=>'search'),
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
			'programaEjercicioses' => array(self::MANY_MANY, 'ProgramaEjercicios', 'programa_ejercicios_has_enfermedad(Ejercicio_idEjercicios, Programa_ejercicios_idPrograma_ejercicios)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEjercicio' => 'Id Ejercicio',
			'seccion_trabajo' => 'Seccion Trabajo',
			'descripcion' => 'Descripcion',
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

		$criteria->compare('idEjercicio',$this->idEjercicio);
		$criteria->compare('seccion_trabajo',$this->seccion_trabajo,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}