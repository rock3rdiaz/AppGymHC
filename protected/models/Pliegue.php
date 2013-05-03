<?php

/**
 * This is the model class for table "Pliegue".
 *
 * The followings are the available columns in table 'Pliegue':
 * @property integer $idPliegues
 * @property string $triceps
 * @property string $sub_escapular
 * @property string $suprailiaco
 * @property string $abdominal
 * @property string $muslo
 * @property string $pantorrilla
 * @property string $porc_grasa
 * @property integer $idValoracion_funcional
 *
 * The followings are the available model relations:
 * @property ValoracionFuncional $idValoracionFuncional
 */
class Pliegue extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pliegue the static model class
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
		return 'Pliegue';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('triceps, sub_escapular, suprailiaco, abdominal, muslo, pantorrilla, porc_grasa, idValoracion_funcional', 'required'),
			array('idValoracion_funcional', 'numerical', 'integerOnly'=>true),
			array('triceps, sub_escapular, suprailiaco, abdominal, muslo, pantorrilla', 'length', 'max'=>8),
			array('porc_grasa', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPliegues, triceps, sub_escapular, suprailiaco, abdominal, muslo, pantorrilla, porc_grasa, idValoracion_funcional', 'safe', 'on'=>'search'),
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
			'idValoracionFuncional' => array(self::BELONGS_TO, 'ValoracionFuncional', 'idValoracion_funcional'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPliegues' => 'Id Pliegues',
			'triceps' => 'Triceps',
			'sub_escapular' => 'Sub Escapular',
			'suprailiaco' => 'Suprailiaco',
			'abdominal' => 'Abdominal',
			'muslo' => 'Muslo',
			'pantorrilla' => 'Pantorrilla',
			'porc_grasa' => 'Porc Grasa',
			'idValoracion_funcional' => 'Id Valoracion Funcional',
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

		$criteria->compare('idPliegues',$this->idPliegues);
		$criteria->compare('triceps',$this->triceps,true);
		$criteria->compare('sub_escapular',$this->sub_escapular,true);
		$criteria->compare('suprailiaco',$this->suprailiaco,true);
		$criteria->compare('abdominal',$this->abdominal,true);
		$criteria->compare('muslo',$this->muslo,true);
		$criteria->compare('pantorrilla',$this->pantorrilla,true);
		$criteria->compare('porc_grasa',$this->porc_grasa,true);
		$criteria->compare('idValoracion_funcional',$this->idValoracion_funcional);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}