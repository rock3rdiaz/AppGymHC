<?php

/**
 * This is the model class for table "Perimetro".
 *
 * The followings are the available columns in table 'Perimetro':
 * @property integer $idPerimetro
 * @property string $triceps
 * @property string $cintura
 * @property string $pectoral
 * @property string $abdominal
 * @property string $cadera
 * @property string $muslo
 * @property string $pantorrilla
 * @property integer $idValoracion_funcional
 *
 * The followings are the available model relations:
 * @property ValoracionFuncional $idValoracionFuncional
 */
class Perimetro extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Perimetro the static model class
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
		return 'Perimetro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('triceps, cintura, pectoral, abdominal, cadera, muslo, pantorrilla, idValoracion_funcional', 'required'),
			array('idValoracion_funcional', 'numerical', 'integerOnly'=>true),
			array('triceps, cintura, pectoral, abdominal, cadera, muslo, pantorrilla', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPerimetro, triceps, cintura, pectoral, abdominal, cadera, muslo, pantorrilla, idValoracion_funcional', 'safe', 'on'=>'search'),
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
			'idPerimetro' => 'Id Perimetro',
			'triceps' => 'Triceps',
			'cintura' => 'Cintura',
			'pectoral' => 'Pectoral',
			'abdominal' => 'Abdominal',
			'cadera' => 'Cadera',
			'muslo' => 'Muslo',
			'pantorrilla' => 'Pantorrilla',
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

		$criteria->compare('idPerimetro',$this->idPerimetro);
		$criteria->compare('triceps',$this->triceps,true);
		$criteria->compare('cintura',$this->cintura,true);
		$criteria->compare('pectoral',$this->pectoral,true);
		$criteria->compare('abdominal',$this->abdominal,true);
		$criteria->compare('cadera',$this->cadera,true);
		$criteria->compare('muslo',$this->muslo,true);
		$criteria->compare('pantorrilla',$this->pantorrilla,true);
		$criteria->compare('idValoracion_funcional',$this->idValoracion_funcional);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}