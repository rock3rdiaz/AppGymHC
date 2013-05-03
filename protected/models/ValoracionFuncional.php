<?php

/**
 * This is the model class for table "valoracion_funcional".
 *
 * The followings are the available columns in table 'valoracion_funcional':
 * @property integer $idValoracion_funcional
 * @property string $objetivo_ejercicio
 * @property string $observaciones
 * @property string $fecha_hora
 * @property string $programa_entrenamiento
 * @property integer $idHistoria_GYM
 *
 * The followings are the available model relations:
 * @property AntecedentesUsuario[] $antecedentesUsuarios
 * @property FrecuenciaEntrenamiento[] $frecuenciaEntrenamientos
 * @property MedidasAntropometricas[] $medidasAntropometricases
 * @property Perimetro[] $perimetros
 * @property Pliegue[] $pliegues
 * @property TestFuncional[] $testFuncionals
 * @property HistoriaGym $idHistoriaGYM
 * @property PlanEntrenamiento[] $planEntrenamientos
 */
class ValoracionFuncional extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ValoracionFuncional the static model class
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
		return 'valoracion_funcional';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('objetivo_ejercicio, fecha_hora, programa_entrenamiento, idHistoria_GYM', 'required'),
			array('idHistoria_GYM', 'numerical', 'integerOnly'=>true),
			array('objetivo_ejercicio', 'length', 'max'=>45),
			array('observaciones', 'length', 'max'=>3000),
			array('programa_entrenamiento', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idValoracion_funcional, objetivo_ejercicio, observaciones, fecha_hora, programa_entrenamiento, idHistoria_GYM', 'safe', 'on'=>'search'),
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
			'antecedentesUsuarios' => array(self::HAS_MANY, 'AntecedentesUsuario', 'idValoracion_funcional'),
			'frecuenciaEntrenamientos' => array(self::HAS_MANY, 'FrecuenciaEntrenamiento', 'idValoracion_funcional'),
			'medidasAntropometricases' => array(self::HAS_MANY, 'MedidasAntropometricas', 'idValoracion_funcional'),
			'perimetros' => array(self::HAS_MANY, 'Perimetro', 'idValoracion_funcional'),
			'pliegues' => array(self::HAS_MANY, 'Pliegue', 'idValoracion_funcional'),
			'testFuncionals' => array(self::HAS_MANY, 'TestFuncional', 'idValoracion_funcional'),
			'idHistoriaGYM' => array(self::BELONGS_TO, 'HistoriaGym', 'idHistoria_GYM'),
			'planEntrenamientos' => array(self::HAS_MANY, 'PlanEntrenamiento', 'idValoracion_funcional'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idValoracion_funcional' => 'Id Valoracion Funcional',
			'objetivo_ejercicio' => 'Objetivo Ejercicio',
			'observaciones' => 'Observaciones',
			'fecha_hora' => 'Fecha Hora',
			'programa_entrenamiento' => 'Programa Entrenamiento',
			'idHistoria_GYM' => 'Id Historia Gym',
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

		$criteria->compare('idValoracion_funcional',$this->idValoracion_funcional);
		$criteria->compare('objetivo_ejercicio',$this->objetivo_ejercicio,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('fecha_hora',$this->fecha_hora,true);
		$criteria->compare('programa_entrenamiento',$this->programa_entrenamiento,true);
		$criteria->compare('idHistoria_GYM',$this->idHistoria_GYM);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}