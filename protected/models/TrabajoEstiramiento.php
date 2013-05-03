<?php

/**
 * This is the model class for table "trabajo_estiramiento".
 *
 * The followings are the available columns in table 'trabajo_estiramiento':
 * @property integer $idTrabajo_estiramiento
 * @property string $nivel
 * @property string $retracciones_musculares
 * @property integer $idPlan_entrenamiento
 * @property integer $series
 * @property integer $segundos
 *
 * The followings are the available model relations:
 * @property PlanEntrenamiento $idPlanEntrenamiento
 */
class TrabajoEstiramiento extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrabajoEstiramiento the static model class
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
		return 'trabajo_estiramiento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nivel, idPlan_entrenamiento, series, segundos', 'required'),
			array('idPlan_entrenamiento, series, segundos', 'numerical', 'integerOnly'=>true),
			array('nivel', 'length', 'max'=>15),
			array('retracciones_musculares', 'length', 'max'=>65),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTrabajo_estiramiento, nivel, retracciones_musculares, idPlan_entrenamiento, series, segundos', 'safe', 'on'=>'search'),
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
			'idTrabajo_estiramiento' => 'Id Trabajo Estiramiento',
			'nivel' => 'Nivel',
			'retracciones_musculares' => 'Retracciones Musculares',
			'idPlan_entrenamiento' => 'Id Plan Entrenamiento',
			'series' => 'Series',
			'segundos' => 'Segundos',
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

		$criteria->compare('idTrabajo_estiramiento',$this->idTrabajo_estiramiento);
		$criteria->compare('nivel',$this->nivel,true);
		$criteria->compare('retracciones_musculares',$this->retracciones_musculares,true);
		$criteria->compare('idPlan_entrenamiento',$this->idPlan_entrenamiento);
		$criteria->compare('series',$this->series);
		$criteria->compare('segundos',$this->segundos);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}