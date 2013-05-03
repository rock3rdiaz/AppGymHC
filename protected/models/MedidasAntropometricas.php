<?php

/**
 * This is the model class for table "medidas_antropometricas".
 *
 * The followings are the available columns in table 'medidas_antropometricas':
 * @property integer $idMedidas_antropometricas
 * @property string $porc_entrenamiento1
 * @property string $porc_entrenamiento2
 * @property string $frecuencia_cardiaca_reposo
 * @property string $frecuencia_cardiaca_maxima
 * @property string $talla
 * @property string $peso_actual
 * @property string $peso_saludable
 * @property string $imc
 * @property integer $idValoracion_funcional
 * @property string $valor_porc_entrenamiento1
 * @property string $valor_porc_entrenamiento2
 *
 * The followings are the available model relations:
 * @property ValoracionFuncional $idValoracionFuncional
 */
class MedidasAntropometricas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MedidasAntropometricas the static model class
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
		return 'medidas_antropometricas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('porc_entrenamiento1, porc_entrenamiento2, frecuencia_cardiaca_reposo, frecuencia_cardiaca_maxima, talla, peso_actual, peso_saludable, imc, idValoracion_funcional, valor_porc_entrenamiento1, valor_porc_entrenamiento2', 'required'),
			array('idValoracion_funcional', 'numerical', 'integerOnly'=>true),
			array('porc_entrenamiento1, porc_entrenamiento2, frecuencia_cardiaca_reposo, frecuencia_cardiaca_maxima, talla, peso_actual, peso_saludable, imc, valor_porc_entrenamiento1, valor_porc_entrenamiento2', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idMedidas_antropometricas, porc_entrenamiento1, porc_entrenamiento2, frecuencia_cardiaca_reposo, frecuencia_cardiaca_maxima, talla, peso_actual, peso_saludable, imc, idValoracion_funcional, valor_porc_entrenamiento1, valor_porc_entrenamiento2', 'safe', 'on'=>'search'),
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
			'idMedidas_antropometricas' => 'Id Medidas Antropometricas',
			'porc_entrenamiento1' => 'Porc Entrenamiento1',
			'porc_entrenamiento2' => 'Porc Entrenamiento2',
			'frecuencia_cardiaca_reposo' => 'Frecuencia Cardiaca Reposo',
			'frecuencia_cardiaca_maxima' => 'Frecuencia Cardiaca Maxima',
			'talla' => 'Talla',
			'peso_actual' => 'Peso Actual',
			'peso_saludable' => 'Peso Saludable',
			'imc' => 'Imc',
			'idValoracion_funcional' => 'Id Valoracion Funcional',
			'valor_porc_entrenamiento1' => 'Valor Porc Entrenamiento1',
			'valor_porc_entrenamiento2' => 'Valor Porc Entrenamiento2',
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

		$criteria->compare('idMedidas_antropometricas',$this->idMedidas_antropometricas);
		$criteria->compare('porc_entrenamiento1',$this->porc_entrenamiento1,true);
		$criteria->compare('porc_entrenamiento2',$this->porc_entrenamiento2,true);
		$criteria->compare('frecuencia_cardiaca_reposo',$this->frecuencia_cardiaca_reposo,true);
		$criteria->compare('frecuencia_cardiaca_maxima',$this->frecuencia_cardiaca_maxima,true);
		$criteria->compare('talla',$this->talla,true);
		$criteria->compare('peso_actual',$this->peso_actual,true);
		$criteria->compare('peso_saludable',$this->peso_saludable,true);
		$criteria->compare('imc',$this->imc,true);
		$criteria->compare('idValoracion_funcional',$this->idValoracion_funcional);
		$criteria->compare('valor_porc_entrenamiento1',$this->valor_porc_entrenamiento1,true);
		$criteria->compare('valor_porc_entrenamiento2',$this->valor_porc_entrenamiento2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}