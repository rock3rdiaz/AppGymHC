<?php

/**
 * This is the model class for table "clases_grupales".
 *
 * The followings are the available columns in table 'clases_grupales':
 * @property integer $idClases_grupales
 * @property string $aerobicos_basico
 * @property string $localidad_abd
 * @property string $mancuerna
 * @property string $fit_cross
 * @property string $flexibilidad
 * @property string $step
 * @property string $gap
 * @property string $danzika
 * @property string $master_class
 * @property string $ciclismo_bajo_techo
 * @property string $pilates
 * @property integer $idPlan_entrenamiento
 * @property string $aerobicos_instructor
 *
 * The followings are the available model relations:
 * @property PlanEntrenamiento $idPlanEntrenamiento
 */
class ClasesGrupales extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ClasesGrupales the static model class
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
		return 'clases_grupales';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('aerobicos_basico, localidad_abd, mancuerna, fit_cross, flexibilidad, step, gap, danzika, master_class, ciclismo_bajo_techo, pilates, idPlan_entrenamiento, aerobicos_instructor', 'required'),
			array('idPlan_entrenamiento', 'numerical', 'integerOnly'=>true),
			array('aerobicos_basico, localidad_abd, mancuerna, fit_cross, flexibilidad, step, gap, danzika, master_class, ciclismo_bajo_techo, pilates, aerobicos_instructor', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idClases_grupales, aerobicos_basico, localidad_abd, mancuerna, fit_cross, flexibilidad, step, gap, danzika, master_class, ciclismo_bajo_techo, pilates, idPlan_entrenamiento, aerobicos_instructor', 'safe', 'on'=>'search'),
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
			'idClases_grupales' => 'Id Clases Grupales',
			'aerobicos_basico' => 'Aerobicos Basico',
			'localidad_abd' => 'Localidad Abd',
			'mancuerna' => 'Mancuerna',
			'fit_cross' => 'Fit Cross',
			'flexibilidad' => 'Flexibilidad',
			'step' => 'Step',
			'gap' => 'Gap',
			'danzika' => 'Danzika',
			'master_class' => 'Master Class',
			'ciclismo_bajo_techo' => 'Ciclismo Bajo Techo',
			'pilates' => 'Pilates',
			'idPlan_entrenamiento' => 'Id Plan Entrenamiento',
			'aerobicos_instructor' => 'Aerobicos Instructor',
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

		$criteria->compare('idClases_grupales',$this->idClases_grupales);
		$criteria->compare('aerobicos_basico',$this->aerobicos_basico,true);
		$criteria->compare('localidad_abd',$this->localidad_abd,true);
		$criteria->compare('mancuerna',$this->mancuerna,true);
		$criteria->compare('fit_cross',$this->fit_cross,true);
		$criteria->compare('flexibilidad',$this->flexibilidad,true);
		$criteria->compare('step',$this->step,true);
		$criteria->compare('gap',$this->gap,true);
		$criteria->compare('danzika',$this->danzika,true);
		$criteria->compare('master_class',$this->master_class,true);
		$criteria->compare('ciclismo_bajo_techo',$this->ciclismo_bajo_techo,true);
		$criteria->compare('pilates',$this->pilates,true);
		$criteria->compare('idPlan_entrenamiento',$this->idPlan_entrenamiento);
		$criteria->compare('aerobicos_instructor',$this->aerobicos_instructor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}