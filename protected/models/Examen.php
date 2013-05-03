<?php

/**
 * This is the model class for table "examen".
 *
 * The followings are the available columns in table 'examen':
 * @property integer $idExamen
 * @property string $descripcion
 * @property string $resultado
 * @property string $fecha_realizacion
 * @property string $fecha_expedicion
 * @property integer $idEvaluacion_medica
 *
 * The followings are the available model relations:
 * @property EvaluacionMedica $idEvaluacionMedica
 */
class Examen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Examen the static model class
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
		return 'examen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion, fecha_realizacion', 'required'),
			array('idEvaluacion_medica', 'numerical', 'integerOnly'=>true),
			array('descripcion, resultado', 'length', 'max'=>100),
			array('fecha_expedicion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idExamen, descripcion, resultado, fecha_realizacion, fecha_expedicion, idEvaluacion_medica', 'safe', 'on'=>'search'),
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
			'idEvaluacionMedica' => array(self::BELONGS_TO, 'EvaluacionMedica', 'idEvaluacion_medica'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idExamen' => 'Id Examen',
			'descripcion' => 'Descripcion',
			'resultado' => 'Resultado',
			'fecha_realizacion' => 'Fecha Realizacion',
			'fecha_expedicion' => 'Fecha Expedicion',
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

		$criteria->compare('idExamen',$this->idExamen);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('resultado',$this->resultado,true);
		$criteria->compare('fecha_realizacion',$this->fecha_realizacion,true);
		$criteria->compare('fecha_expedicion',$this->fecha_expedicion,true);
		$criteria->compare('idEvaluacion_medica',$this->idEvaluacion_medica);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}