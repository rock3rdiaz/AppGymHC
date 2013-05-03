<?php

/**
 * This is the model class for table "Antecedentes_familiares".
 *
 * The followings are the available columns in table 'Antecedentes_familiares':
 * @property integer $idAntecedentes_familiares
 * @property string $otros
 * @property integer $idEvaluacion_medica
 *
 * The followings are the available model relations:
 * @property EvaluacionMedica $idEvaluacionMedica
 * @property Enfermedad[] $enfermedads
 */
class AntecedentesFamiliares extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AntecedentesFamiliares the static model class
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
		return 'Antecedentes_familiares';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idEvaluacion_medica', 'required'),
			array('idEvaluacion_medica', 'numerical', 'integerOnly'=>true),
			array('otros', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idAntecedentes_familiares, otros, idEvaluacion_medica', 'safe', 'on'=>'search'),
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
			'idEvaluacionMedica' => array(self::BELONGS_TO, 'EvaluacionMedica', 'idEvaluacion_medica'),
			'enfermedads' => array(self::MANY_MANY, 'Enfermedad', 'Antecedentes_familiares_enfermedad(idAntecedentes_familiares, idEnfermedad)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAntecedentes_familiares' => 'Id Antecedentes Familiares',
			'otros' => 'Otros',
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

		$criteria->compare('idAntecedentes_familiares',$this->idAntecedentes_familiares);
		$criteria->compare('otros',$this->otros,true);
		$criteria->compare('idEvaluacion_medica',$this->idEvaluacion_medica);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}