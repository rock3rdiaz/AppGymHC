<?php

/**
 * This is the model class for table "Medidas_fisicas".
 *
 * The followings are the available columns in table 'Medidas_fisicas':
 * @property integer $idMedidas_fisicas
 * @property string $ta
 * @property string $fc
 * @property string $fr
 * @property string $peso
 * @property string $talla
 * @property string $imc
 * @property string $peso_ideal
 * @property string $gasto_basal_energia
 *
 * The followings are the available model relations:
 * @property ExamenFisico[] $examenFisicos
 */
class MedidasFisicas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MedidasFisicas the static model class
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
		return 'Medidas_fisicas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ta, fc, fr, peso, talla, imc, peso_ideal, gasto_basal_energia', 'required'),
			array('ta, fc, fr, peso, talla, imc, peso_ideal, gasto_basal_energia', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idMedidas_fisicas, ta, fc, fr, peso, talla, imc, peso_ideal, gasto_basal_energia', 'safe', 'on'=>'search'),
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
			'examenFisicos' => array(self::HAS_MANY, 'ExamenFisico', 'idMedidas_fisicas'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idMedidas_fisicas' => 'Id Medidas Fisicas',
			'ta' => 'Ta',
			'fc' => 'Fc',
			'fr' => 'Fr',
			'peso' => 'Peso',
			'talla' => 'Talla',
			'imc' => 'Imc',
			'peso_ideal' => 'Peso Ideal',
			'gasto_basal_energia' => 'Gasto Basal Energia',
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

		$criteria->compare('idMedidas_fisicas',$this->idMedidas_fisicas);
		$criteria->compare('ta',$this->ta,true);
		$criteria->compare('fc',$this->fc,true);
		$criteria->compare('fr',$this->fr,true);
		$criteria->compare('peso',$this->peso,true);
		$criteria->compare('talla',$this->talla,true);
		$criteria->compare('imc',$this->imc,true);
		$criteria->compare('peso_ideal',$this->peso_ideal,true);
		$criteria->compare('gasto_basal_energia',$this->gasto_basal_energia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}