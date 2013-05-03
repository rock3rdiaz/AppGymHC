<?php

/**
 * This is the model class for table "Examen_fisico".
 *
 * The followings are the available columns in table 'Examen_fisico':
 * @property integer $idExamen_fisico
 * @property string $observaciones
 * @property string $estado_general
 * @property string $conciente
 * @property string $alerta
 * @property string $hidratado
 * @property integer $idMedidas_fisicas
 * @property integer $idCaracteristicas_fisicas
 * @property integer $idEvaluacion_medica
 *
 * The followings are the available model relations:
 * @property CaracteristicasFisicas $idCaracteristicasFisicas
 * @property EvaluacionMedica $idEvaluacionMedica
 * @property MedidasFisicas $idMedidasFisicas
 */
class ExamenFisico extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ExamenFisico the static model class
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
		return 'Examen_fisico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estado_general, conciente, alerta, idMedidas_fisicas, idCaracteristicas_fisicas, idEvaluacion_medica', 'required'),
			array('idMedidas_fisicas, idCaracteristicas_fisicas, idEvaluacion_medica', 'numerical', 'integerOnly'=>true),
			array('observaciones', 'length', 'max'=>100),
			array('estado_general', 'length', 'max'=>10),
			array('conciente, alerta, hidratado', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idExamen_fisico, observaciones, estado_general, conciente, alerta, hidratado, idMedidas_fisicas, idCaracteristicas_fisicas, idEvaluacion_medica', 'safe', 'on'=>'search'),
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
			'idCaracteristicasFisicas' => array(self::BELONGS_TO, 'CaracteristicasFisicas', 'idCaracteristicas_fisicas'),
			'idEvaluacionMedica' => array(self::BELONGS_TO, 'EvaluacionMedica', 'idEvaluacion_medica'),
			'idMedidasFisicas' => array(self::BELONGS_TO, 'MedidasFisicas', 'idMedidas_fisicas'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idExamen_fisico' => 'Id Examen Fisico',
			'observaciones' => 'Observaciones',
			'estado_general' => 'Estado General',
			'conciente' => 'Conciente',
			'alerta' => 'Alerta',
			'hidratado' => 'Hidratado',
			'idMedidas_fisicas' => 'Id Medidas Fisicas',
			'idCaracteristicas_fisicas' => 'Id Caracteristicas Fisicas',
			'idEvaluacion_medica' => 'Id Evaluacion Medica',
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

		$criteria->compare('idExamen_fisico',$this->idExamen_fisico);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('estado_general',$this->estado_general,true);
		$criteria->compare('conciente',$this->conciente,true);
		$criteria->compare('alerta',$this->alerta,true);
		$criteria->compare('hidratado',$this->hidratado,true);
		$criteria->compare('idMedidas_fisicas',$this->idMedidas_fisicas);
		$criteria->compare('idCaracteristicas_fisicas',$this->idCaracteristicas_fisicas);
		$criteria->compare('idEvaluacion_medica',$this->idEvaluacion_medica);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}