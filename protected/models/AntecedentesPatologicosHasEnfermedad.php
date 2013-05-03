<?php

/**
 * This is the model class for table "Antecedentes_patologicos_has_Enfermedad".
 *
 * The followings are the available columns in table 'Antecedentes_patologicos_has_Enfermedad':
 * @property integer $Antecedentes_patologicos_idAntecedentes_patologicos
 * @property integer $Enfermedad_idEnfermedad
 */
class AntecedentesPatologicosHasEnfermedad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AntecedentesPatologicosHasEnfermedad the static model class
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
		return 'Antecedentes_patologicos_has_Enfermedad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Antecedentes_patologicos_idAntecedentes_patologicos, Enfermedad_idEnfermedad', 'required'),
			array('Antecedentes_patologicos_idAntecedentes_patologicos, Enfermedad_idEnfermedad', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Antecedentes_patologicos_idAntecedentes_patologicos, Enfermedad_idEnfermedad', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Antecedentes_patologicos_idAntecedentes_patologicos' => 'Antecedentes Patologicos Id Antecedentes Patologicos',
			'Enfermedad_idEnfermedad' => 'Enfermedad Id Enfermedad',
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

		$criteria->compare('Antecedentes_patologicos_idAntecedentes_patologicos',$this->Antecedentes_patologicos_idAntecedentes_patologicos);
		$criteria->compare('Enfermedad_idEnfermedad',$this->Enfermedad_idEnfermedad);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}