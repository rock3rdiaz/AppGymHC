<?php

/**
 * This is the model class for table "Antecedentes_trauma_lesion_lesion".
 *
 * The followings are the available columns in table 'Antecedentes_trauma_lesion_lesion':
 * @property integer $idLesion
 * @property integer $idAntecedentes_trauma_lesion
 */
class AntecedentesTraumaLesionLesion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AntecedentesTraumaLesionLesion the static model class
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
		return 'Antecedentes_trauma_lesion_lesion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idLesion, idAntecedentes_trauma_lesion', 'required'),
			array('idLesion, idAntecedentes_trauma_lesion', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idLesion, idAntecedentes_trauma_lesion', 'safe', 'on'=>'search'),
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
			'idLesion' => 'Id Lesion',
			'idAntecedentes_trauma_lesion' => 'Id Antecedentes Trauma Lesion',
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

		$criteria->compare('idLesion',$this->idLesion);
		$criteria->compare('idAntecedentes_trauma_lesion',$this->idAntecedentes_trauma_lesion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}