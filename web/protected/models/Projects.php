<?php

/**
 * This is the model class for table "sl_projects".
 *
 * The followings are the available columns in table 'sl_projects':
 * @property integer $projectId
 * @property string $name
 * @property string $description
 * @property string $entryDate
 * @property string $startDate
 * @property string $etaDate
 * @property string $priceEstimate
 *
 * The followings are the available model relations:
 * @property ProjectLinks[] $slProjectLinks
 * @property Teams[] $slTeams
 */
class Projects extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sl_projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, entryDate, startDate, etaDate', 'required'),
			array('name', 'length', 'max'=>255),
			array('entryDate, startDate, etaDate, priceEstimate', 'length', 'max'=>21),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('projectId, name, description, entryDate, startDate, etaDate, priceEstimate', 'safe', 'on'=>'search'),
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
			'slProjectLinks' => array(self::MANY_MANY, 'ProjectLinks', 'sl_project_has_links(projectFid, projectLinkFid)'),
			'slTeams' => array(self::MANY_MANY, 'Teams', 'sl_team_in_project(projectFid, teamFid)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'projectId' => 'Project',
			'name' => 'Name',
			'description' => 'Description',
			'entryDate' => 'Entry Date',
			'startDate' => 'Start Date',
			'etaDate' => 'Eta Date',
			'priceEstimate' => 'Price Estimate',
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

		$criteria->compare('projectId',$this->projectId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('entryDate',$this->entryDate,true);
		$criteria->compare('startDate',$this->startDate,true);
		$criteria->compare('etaDate',$this->etaDate,true);
		$criteria->compare('priceEstimate',$this->priceEstimate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Projects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
