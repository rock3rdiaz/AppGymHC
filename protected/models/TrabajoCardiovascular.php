<?php

/**
 * This is the model class for table "trabajo_cardiovascular".
 *
 * The followings are the available columns in table 'trabajo_cardiovascular':
 * @property integer $idTrabajo_cardiovascular
 * @property integer $continuo
 * @property integer $intervalo
 * @property string $circuito_estaciones
 * @property string $categoria
 * @property integer $idPlan_entrenamiento
 *
 * The followings are the available model relations:
 * @property PlanEntrenamiento $idPlanEntrenamiento
 */
class TrabajoCardiovascular extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrabajoCardiovascular the static model class
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
		return 'trabajo_cardiovascular';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('continuo, intervalo, categoria, idPlan_entrenamiento', 'required'),
			array('continuo, intervalo, idPlan_entrenamiento', 'numerical', 'integerOnly'=>true),
			array('circuito_estaciones', 'length', 'max'=>100),
			array('categoria', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTrabajo_cardiovascular, continuo, intervalo, circuito_estaciones, categoria, idPlan_entrenamiento', 'safe', 'on'=>'search'),
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
			'idPlanEntrenamiento' => array(self::BELONGS_TO, 'PlanEntrenamiento', 'idPlan_entrenamiento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTrabajo_cardiovascular' => 'Id Trabajo Cardiovascular',
			'continuo' => 'Continuo (min)',
			'intervalo' => 'Intervalo (min)',
			'circuito_estaciones' => 'Circuito Estaciones',
			'categoria' => 'Categoria',
			'idPlan_entrenamiento' => 'Id Plan Entrenamiento',
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

		$criteria->compare('idTrabajo_cardiovascular',$this->idTrabajo_cardiovascular);
		$criteria->compare('continuo',$this->continuo);
		$criteria->compare('intervalo',$this->intervalo);
		$criteria->compare('circuito_estaciones',$this->circuito_estaciones,true);
		$criteria->compare('categoria',$this->categoria,true);
		$criteria->compare('idPlan_entrenamiento',$this->idPlan_entrenamiento);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}