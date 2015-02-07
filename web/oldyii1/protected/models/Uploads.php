<?php

/**
 * This is the model class for table "sl_uploads".
 *
 * The followings are the available columns in table 'sl_uploads':
 * @property integer $uploadsId
 * @property string $fullpath
 *
 * The followings are the available model relations:
 * @property CvExportFormats[] $cvExportFormats
 * @property Teams[] $teams
 * @property ThinkingThursday[] $slThinkingThursdays
 * @property UserData[] $userDatas
 * @property UsersCvData[] $usersCvDatas
 */
class Uploads extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sl_uploads';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fullpath', 'required'),
			array('fullpath', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uploadsId, fullpath', 'safe', 'on'=>'search'),
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
			'cvExportFormats' => array(self::HAS_MANY, 'CvExportFormats', 'formatIconFid'),
			'teams' => array(self::HAS_MANY, 'Teams', 'teamImageId'),
			'slThinkingThursdays' => array(self::MANY_MANY, 'ThinkingThursday', 'sl_thinking_thursday_has_files(uploadFid, ttFid)'),
			'userDatas' => array(self::HAS_MANY, 'UserData', 'avatarUploadFid'),
			'usersCvDatas' => array(self::HAS_MANY, 'UsersCvData', 'imageFid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uploadsId' => 'Uploads',
			'fullpath' => 'Fullpath',
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

		$criteria->compare('uploadsId',$this->uploadsId);
		$criteria->compare('fullpath',$this->fullpath,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Uploads the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
