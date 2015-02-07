<?php

/**
 * This is the model class for table "sl_pastebin".
 *
 * The followings are the available columns in table 'sl_pastebin':
 * @property integer $pastebinId
 * @property string $title
 * @property string $pasteData
 * @property integer $canExpire
 * @property string $expireTimestamp
 * @property integer $isPrivate
 * @property integer $usersFid
 * @property integer $langFid
 *
 * The followings are the available model relations:
 * @property Users $usersF
 * @property PastebinLang $langF
 */
class Pastebin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sl_pastebin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, pasteData, expireTimestamp, isPrivate, usersFid, langFid', 'required'),
			array('canExpire, isPrivate, usersFid, langFid', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('expireTimestamp', 'length', 'max'=>21),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pastebinId, title, pasteData, canExpire, expireTimestamp, isPrivate, usersFid, langFid', 'safe', 'on'=>'search'),
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
			'usersF' => array(self::BELONGS_TO, 'Users', 'usersFid'),
			'langF' => array(self::BELONGS_TO, 'PastebinLang', 'langFid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pastebinId' => 'Pastebin',
			'title' => 'Title',
			'pasteData' => 'Paste Data',
			'canExpire' => 'Can Expire',
			'expireTimestamp' => 'Expire Timestamp',
			'isPrivate' => 'Is Private',
			'usersFid' => 'Users Fid',
			'langFid' => 'Lang Fid',
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

		$criteria->compare('pastebinId',$this->pastebinId);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('pasteData',$this->pasteData,true);
		$criteria->compare('canExpire',$this->canExpire);
		$criteria->compare('expireTimestamp',$this->expireTimestamp,true);
		$criteria->compare('isPrivate',$this->isPrivate);
		$criteria->compare('usersFid',$this->usersFid);
		$criteria->compare('langFid',$this->langFid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pastebin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
