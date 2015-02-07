<?php

/**
 * This is the model class for table "sl_thinking_thursday".
 *
 * The followings are the available columns in table 'sl_thinking_thursday':
 * @property integer $ttId
 * @property string $topicName
 * @property string $eventDate
 * @property string $abstract
 *
 * The followings are the available model relations:
 * @property Uploads[] $slUploads
 * @property ThinkingThursdayHosts[] $slThinkingThursdayHosts
 * @property ThinkingThursdayRelated[] $thinkingThursdayRelateds
 * @property ThinkingThursdayRelated[] $thinkingThursdayRelateds1
 */
class ThinkingThursday extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sl_thinking_thursday';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('topicName, eventDate, abstract', 'required'),
			array('topicName', 'length', 'max'=>255),
			array('eventDate', 'length', 'max'=>21),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ttId, topicName, eventDate, abstract', 'safe', 'on'=>'search'),
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
			'slUploads' => array(self::MANY_MANY, 'Uploads', 'sl_thinking_thursday_has_files(ttFid, uploadFid)'),
			'slThinkingThursdayHosts' => array(self::MANY_MANY, 'ThinkingThursdayHosts', 'sl_thinking_thursday_has_hosts(ttFid, ttHostFid)'),
			'thinkingThursdayRelateds' => array(self::HAS_MANY, 'ThinkingThursdayRelated', 'originTTFid'),
			'thinkingThursdayRelateds1' => array(self::HAS_MANY, 'ThinkingThursdayRelated', 'relatedTTFid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ttId' => 'Tt',
			'topicName' => 'Topic Name',
			'eventDate' => 'Event Date',
			'abstract' => 'Abstract',
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

		$criteria->compare('ttId',$this->ttId);
		$criteria->compare('topicName',$this->topicName,true);
		$criteria->compare('eventDate',$this->eventDate,true);
		$criteria->compare('abstract',$this->abstract,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ThinkingThursday the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
