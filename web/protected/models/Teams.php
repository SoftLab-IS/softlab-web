<?php

/**
 * This is the model class for table "sl_teams".
 *
 * The followings are the available columns in table 'sl_teams':
 * @property integer $teamId
 * @property string $name
 * @property string $entryDate
 * @property string $description
 * @property integer $createdByUserFid
 * @property integer $teamLeaderId
 * @property integer $teamImageId
 *
 * The followings are the available model relations:
 * @property Projects[] $slProjects
 * @property Users $createdByUserF
 * @property Uploads $teamImage
 * @property Users $teamLeader
 * @property Users[] $slUsers
 */
class Teams extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sl_teams';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, entryDate, createdByUserFid, teamLeaderId', 'required'),
			array('createdByUserFid, teamLeaderId, teamImageId', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('entryDate', 'length', 'max'=>21),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('teamId, name, entryDate, description, createdByUserFid, teamLeaderId, teamImageId', 'safe', 'on'=>'search'),
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
			'slProjects' => array(self::MANY_MANY, 'Projects', 'sl_team_in_project(teamFid, projectFid)'),
			'createdByUserF' => array(self::BELONGS_TO, 'Users', 'createdByUserFid'),
			'teamImage' => array(self::BELONGS_TO, 'Uploads', 'teamImageId'),
			'teamLeader' => array(self::BELONGS_TO, 'Users', 'teamLeaderId'),
			'slUsers' => array(self::MANY_MANY, 'Users', 'sl_user_in_team(teamFid, usersFid)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'teamId' => 'Team',
			'name' => 'Name',
			'entryDate' => 'Entry Date',
			'description' => 'Description',
			'createdByUserFid' => 'Created By User Fid',
			'teamLeaderId' => 'Team Leader',
			'teamImageId' => 'Team Image',
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

		$criteria->compare('teamId',$this->teamId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('entryDate',$this->entryDate,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('createdByUserFid',$this->createdByUserFid);
		$criteria->compare('teamLeaderId',$this->teamLeaderId);
		$criteria->compare('teamImageId',$this->teamImageId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Teams the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
