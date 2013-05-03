<?php

/**
 * This is the model class for table "enfermedad".
 *
 * The followings are the available columns in table 'enfermedad':
 * @property integer $idEnfermedad
 * @property string $descripcion
 * @property string $tipo
 *
 * The followings are the available model relations:
 * @property AntecedentesPatologicos[] $antecedentesPatologicoses
 */
class Enfermedad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Enfermedad the static model class
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
		return 'enfermedad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion', 'required'),
			array('descripcion', 'length', 'max'=>65),
			array('tipo', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idEnfermedad, descripcion, tipo', 'safe', 'on'=>'search'),
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
			'antecedentesPatologicoses' => array(self::MANY_MANY, 'AntecedentesPatologicos', 'antecedentes_patologicos_has_enfermedad(Enfermedad_idEnfermedad, Antecedentes_patologicos_idAntecedentes_patologicos)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEnfermedad' => 'Id Enfermedad',
			'descripcion' => 'Descripcion',
			'tipo' => 'Tipo',
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

		$criteria->compare('idEnfermedad',$this->idEnfermedad);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('tipo',$this->tipo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}