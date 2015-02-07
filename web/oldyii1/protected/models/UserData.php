<?php

/**
 * This is the model class for table "sl_user_data".
 *
 * The followings are the available columns in table 'sl_user_data':
 * @property integer $userDataId
 * @property string $firstName
 * @property string $lastName
 * @property string $registrationDate
 * @property string $lastLoginDate
 * @property string $lastLoginIP
 * @property integer $avatarUploadFid
 * @property string $facebookLink
 * @property string $twitterLink
 * @property string $linkedInLink
 * @property string $googlePlusLink
 * @property string $aboutMeLink
 *
 * The followings are the available model relations:
 * @property Uploads $avatarUploadF
 * @property UsersCvData[] $slUsersCvDatas
 * @property Users[] $users
 */
class UserData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sl_user_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('registrationDate', 'required'),
			array('avatarUploadFid', 'numerical', 'integerOnly'=>true),
			array('firstName, lastName', 'length', 'max'=>30),
			array('registrationDate, lastLoginDate', 'length', 'max'=>21),
			array('lastLoginIP', 'length', 'max'=>80),
			array('facebookLink, twitterLink, linkedInLink, googlePlusLink, aboutMeLink', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userDataId, firstName, lastName, registrationDate, lastLoginDate, lastLoginIP, avatarUploadFid, facebookLink, twitterLink, linkedInLink, googlePlusLink, aboutMeLink', 'safe', 'on'=>'search'),
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
			'avatarUploadF' => array(self::BELONGS_TO, 'Uploads', 'avatarUploadFid'),
			'slUsersCvDatas' => array(self::MANY_MANY, 'UsersCvData', 'sl_user_data_has_cv_data(userDataFid, userDataCvFid)'),
			'users' => array(self::HAS_MANY, 'Users', 'userDataFid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userDataId' => 'User Data',
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'registrationDate' => 'Registration Date',
			'lastLoginDate' => 'Last Login Date',
			'lastLoginIP' => 'Last Login Ip',
			'avatarUploadFid' => 'Avatar Upload Fid',
			'facebookLink' => 'Facebook Link',
			'twitterLink' => 'Twitter Link',
			'linkedInLink' => 'Linked In Link',
			'googlePlusLink' => 'Google Plus Link',
			'aboutMeLink' => 'About Me Link',
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

		$criteria->compare('userDataId',$this->userDataId);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('registrationDate',$this->registrationDate,true);
		$criteria->compare('lastLoginDate',$this->lastLoginDate,true);
		$criteria->compare('lastLoginIP',$this->lastLoginIP,true);
		$criteria->compare('avatarUploadFid',$this->avatarUploadFid);
		$criteria->compare('facebookLink',$this->facebookLink,true);
		$criteria->compare('twitterLink',$this->twitterLink,true);
		$criteria->compare('linkedInLink',$this->linkedInLink,true);
		$criteria->compare('googlePlusLink',$this->googlePlusLink,true);
		$criteria->compare('aboutMeLink',$this->aboutMeLink,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
