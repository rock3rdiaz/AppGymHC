<?php

/**
 * This is the model class for table "Antecedentes_trauma_lesion".
 *
 * The followings are the available columns in table 'Antecedentes_trauma_lesion':
 * @property integer $idAntecedentes_trauma_lesion
 * @property string $otros
 * @property integer $idEvaluacion_medica
 * @property string $contusion
 * @property string $distension
 * @property string $esguince
 * @property string $luxacion
 * @property string $fractura
 * @property string $quirurgico
 *
 * The followings are the available model relations:
 * @property EvaluacionMedica $idEvaluacionMedica
 */
class AntecedentesTraumaLesion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AntecedentesTraumaLesion the static model class
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
		return 'Antecedentes_trauma_lesion';
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
			array('contusion, distension, esguince, luxacion, fractura, quirurgico', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idAntecedentes_trauma_lesion, otros, idEvaluacion_medica, contusion, distension, esguince, luxacion, fractura, quirurgico', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAntecedentes_trauma_lesion' => 'Id Antecedentes Trauma Lesion',
			'otros' => 'Otros',
			'idEvaluacion_medica' => 'Id Evaluacion Medica',
			'contusion' => 'Contusion',
			'distension' => 'Distension',
			'esguince' => 'Esguince',
			'luxacion' => 'Luxacion',
			'fractura' => 'Fractura',
			'quirurgico' => 'Quirurgico',
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

		$criteria->compare('idAntecedentes_trauma_lesion',$this->idAntecedentes_trauma_lesion);
		$criteria->compare('otros',$this->otros,true);
		$criteria->compare('idEvaluacion_medica',$this->idEvaluacion_medica);
		$criteria->compare('contusion',$this->contusion,true);
		$criteria->compare('distension',$this->distension,true);
		$criteria->compare('esguince',$this->esguince,true);
		$criteria->compare('luxacion',$this->luxacion,true);
		$criteria->compare('fractura',$this->fractura,true);
		$criteria->compare('quirurgico',$this->quirurgico,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}