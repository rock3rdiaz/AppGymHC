<?php

/**
 * This is the model class for table "Antecedentes_personales".
 *
 * The followings are the available columns in table 'Antecedentes_personales':
 * @property integer $idAntecedentes_personales
 * @property string $habito
 * @property string $medicacion_actual
 * @property string $antecedentes_importantes
 * @property integer $idEvaluacion_medica
 *
 * The followings are the available model relations:
 * @property EvaluacionMedica $idEvaluacionMedica
 * @property Enfermedad[] $enfermedads
 */
class AntecedentesPersonales extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AntecedentesPersonales the static model class
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
		return 'Antecedentes_personales';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('habito, idEvaluacion_medica', 'required'),
			array('idEvaluacion_medica', 'numerical', 'integerOnly'=>true),
			array('habito', 'length', 'max'=>10),
			array('medicacion_actual', 'length', 'max'=>20),
			array('antecedentes_importantes', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idAntecedentes_personales, habito, medicacion_actual, antecedentes_importantes, idEvaluacion_medica', 'safe', 'on'=>'search'),
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
			'enfermedads' => array(self::MANY_MANY, 'Enfermedad', 'Antecedentes_personales_enfermedad(idAntecedentes_personales, idEnfermedad)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAntecedentes_personales' => 'Id Antecedentes Personales',
			'habito' => 'Habito',
			'medicacion_actual' => 'Medicacion Actual',
			'antecedentes_importantes' => 'Antecedentes Importantes',
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

		$criteria->compare('idAntecedentes_personales',$this->idAntecedentes_personales);
		$criteria->compare('habito',$this->habito,true);
		$criteria->compare('medicacion_actual',$this->medicacion_actual,true);
		$criteria->compare('antecedentes_importantes',$this->antecedentes_importantes,true);
		$criteria->compare('idEvaluacion_medica',$this->idEvaluacion_medica);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}