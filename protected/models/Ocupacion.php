<?php

/**
 * This is the model class for table "Ocupacion".
 *
 * The followings are the available columns in table 'Ocupacion':
 * @property integer $idOcupacion
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property Usuario[] $usuarios
 */
class Ocupacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ocupacion the static model class
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
		return 'Ocupacion';
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
			array('descripcion', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idOcupacion, descripcion', 'safe', 'on'=>'search'),
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
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'idOcupacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idOcupacion' => 'Id Ocupacion',
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

		$criteria->compare('idOcupacion',$this->idOcupacion);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}