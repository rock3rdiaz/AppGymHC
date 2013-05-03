<?php

/**
 * This is the model class for table "programa_ejercicios".
 *
 * The followings are the available columns in table 'programa_ejercicios':
 * @property integer $idPrograma_ejercicios
 * @property string $fecha_realizacion
 * @property string $observaciones
 * @property integer $idPlan_entrenamiento
 *
 * The followings are the available model relations:
 * @property PlanEntrenamiento $idPlanEntrenamiento
 * @property Ejercicio[] $ejercicios
 */
class ProgramaEjercicios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProgramaEjercicios the static model class
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
		return 'programa_ejercicios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_realizacion, observaciones, idPlan_entrenamiento', 'required'),
			array('idPlan_entrenamiento', 'numerical', 'integerOnly'=>true),
			array('observaciones', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPrograma_ejercicios, fecha_realizacion, observaciones, idPlan_entrenamiento', 'safe', 'on'=>'search'),
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
			'idPlanEntrenamiento' => array(self::BELONGS_TO, 'PlanEntrenamiento', 'idPlan_entrenamiento'),
			'ejercicios' => array(self::MANY_MANY, 'Ejercicio', 'programa_ejercicios_has_enfermedad(Programa_ejercicios_idPrograma_ejercicios, Ejercicio_idEjercicios)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPrograma_ejercicios' => 'Id Programa Ejercicios',
			'fecha_realizacion' => 'Fecha Realizacion',
			'observaciones' => 'Observaciones',
			'idPlan_entrenamiento' => 'Id Plan Entrenamiento',
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

		$criteria->compare('idPrograma_ejercicios',$this->idPrograma_ejercicios);
		$criteria->compare('fecha_realizacion',$this->fecha_realizacion,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('idPlan_entrenamiento',$this->idPlan_entrenamiento);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}