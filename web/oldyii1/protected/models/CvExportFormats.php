<?php

/**
 * This is the model class for table "sl_cv_export_formats".
 *
 * The followings are the available columns in table 'sl_cv_export_formats':
 * @property integer $exportFormatId
 * @property string $name
 * @property string $formatterAction
 * @property integer $formatIconFid
 * @property string $formatterFields
 *
 * The followings are the available model relations:
 * @property Uploads $formatIconF
 * @property UsersCvData[] $usersCvDatas
 */
class CvExportFormats extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sl_cv_export_formats';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, formatterAction, formatterFields', 'required'),
			array('formatIconFid', 'numerical', 'integerOnly'=>true),
			array('name, formatterAction', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('exportFormatId, name, formatterAction, formatIconFid, formatterFields', 'safe', 'on'=>'search'),
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
			'formatIconF' => array(self::BELONGS_TO, 'Uploads', 'formatIconFid'),
			'usersCvDatas' => array(self::HAS_MANY, 'UsersCvData', 'exportFormatFid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'exportFormatId' => 'Export Format',
			'name' => 'Name',
			'formatterAction' => 'Formatter Action',
			'formatIconFid' => 'Format Icon Fid',
			'formatterFields' => 'Formatter Fields',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('exportFormatId',$this->exportFormatId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('formatterAction',$this->formatterAction,true);
		$criteria->compare('formatIconFid',$this->formatIconFid);
		$criteria->compare('formatterFields',$this->formatterFields,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CvExportFormats the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
