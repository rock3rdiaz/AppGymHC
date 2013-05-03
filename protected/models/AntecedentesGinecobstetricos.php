<?php

/**
 * This is the model class for table "Antecedentes_ginecobstetricos".
 *
 * The followings are the available columns in table 'Antecedentes_ginecobstetricos':
 * @property integer $idAntecedentes_ginecobstetricos
 * @property string $ciclo
 * @property integer $menarquia
 * @property string $pf
 * @property string $otros
 * @property integer $idEvaluacion_medica
 * @property string $aplica_si_no
 *
 * The followings are the available model relations:
 * @property EvaluacionMedica $idEvaluacionMedica
 */
class AntecedentesGinecobstetricos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AntecedentesGinecobstetricos the static model class
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
		return 'Antecedentes_ginecobstetricos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idEvaluacion_medica, aplica_si_no', 'required'),
			array('menarquia, idEvaluacion_medica', 'numerical', 'integerOnly'=>true),
			array('ciclo, pf', 'length', 'max'=>20),
			array('otros', 'length', 'max'=>45),
			array('aplica_si_no', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idAntecedentes_ginecobstetricos, ciclo, menarquia, pf, otros, idEvaluacion_medica, aplica_si_no', 'safe', 'on'=>'search'),
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
			'idAntecedentes_ginecobstetricos' => 'Id Antecedentes Ginecobstetricos',
			'ciclo' => 'Ciclo',
			'menarquia' => 'Menarquia',
			'pf' => 'Pf',
			'otros' => 'Otros',
			'idEvaluacion_medica' => 'Id Evaluacion Medica',
			'aplica_si_no' => 'Aplica Si No',
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

		$criteria->compare('idAntecedentes_ginecobstetricos',$this->idAntecedentes_ginecobstetricos);
		$criteria->compare('ciclo',$this->ciclo,true);
		$criteria->compare('menarquia',$this->menarquia);
		$criteria->compare('pf',$this->pf,true);
		$criteria->compare('otros',$this->otros,true);
		$criteria->compare('idEvaluacion_medica',$this->idEvaluacion_medica);
		$criteria->compare('aplica_si_no',$this->aplica_si_no,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}