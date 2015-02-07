<?php

/**
 * This is the model class for table "sl_thinking_thursday_hosts".
 *
 * The followings are the available columns in table 'sl_thinking_thursday_hosts':
 * @property integer $ttHostId
 * @property string $fullName
 * @property string $email
 * @property string $facebookLink
 * @property string $twitterLink
 * @property string $linkedInLink
 * @property string $googlePlusLink
 * @property string $aboutMeLink
 * @property integer $hostMemberFid
 *
 * The followings are the available model relations:
 * @property ThinkingThursday[] $slThinkingThursdays
 * @property Users $hostMemberF
 */
class ThinkingThursdayHosts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sl_thinking_thursday_hosts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fullName', 'required'),
			array('hostMemberFid', 'numerical', 'integerOnly'=>true),
			array('fullName', 'length', 'max'=>70),
			array('email, facebookLink, twitterLink, linkedInLink, googlePlusLink, aboutMeLink', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ttHostId, fullName, email, facebookLink, twitterLink, linkedInLink, googlePlusLink, aboutMeLink, hostMemberFid', 'safe', 'on'=>'search'),
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
			'slThinkingThursdays' => array(self::MANY_MANY, 'ThinkingThursday', 'sl_thinking_thursday_has_hosts(ttHostFid, ttFid)'),
			'hostMemberF' => array(self::BELONGS_TO, 'Users', 'hostMemberFid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ttHostId' => 'Tt Host',
			'fullName' => 'Full Name',
			'email' => 'Email',
			'facebookLink' => 'Facebook Link',
			'twitterLink' => 'Twitter Link',
			'linkedInLink' => 'Linked In Link',
			'googlePlusLink' => 'Google Plus Link',
			'aboutMeLink' => 'About Me Link',
			'hostMemberFid' => 'Host Member Fid',
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

		$criteria->compare('ttHostId',$this->ttHostId);
		$criteria->compare('fullName',$this->fullName,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('facebookLink',$this->facebookLink,true);
		$criteria->compare('twitterLink',$this->twitterLink,true);
		$criteria->compare('linkedInLink',$this->linkedInLink,true);
		$criteria->compare('googlePlusLink',$this->googlePlusLink,true);
		$criteria->compare('aboutMeLink',$this->aboutMeLink,true);
		$criteria->compare('hostMemberFid',$this->hostMemberFid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ThinkingThursdayHosts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
