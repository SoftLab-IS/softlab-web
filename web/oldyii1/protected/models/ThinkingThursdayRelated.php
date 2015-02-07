<?php

/**
 * This is the model class for table "sl_thinking_thursday_related".
 *
 * The followings are the available columns in table 'sl_thinking_thursday_related':
 * @property integer $originTTFid
 * @property integer $relatedTTFid
 * @property integer $relationType
 *
 * The followings are the available model relations:
 * @property ThinkingThursday $originTTF
 * @property ThinkingThursday $relatedTTF
 * @property TtRelationType $relationType0
 */
class ThinkingThursdayRelated extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sl_thinking_thursday_related';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('originTTFid, relatedTTFid, relationType', 'required'),
			array('originTTFid, relatedTTFid, relationType', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('originTTFid, relatedTTFid, relationType', 'safe', 'on'=>'search'),
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
			'originTTF' => array(self::BELONGS_TO, 'ThinkingThursday', 'originTTFid'),
			'relatedTTF' => array(self::BELONGS_TO, 'ThinkingThursday', 'relatedTTFid'),
			'relationType0' => array(self::BELONGS_TO, 'TtRelationType', 'relationType'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'originTTFid' => 'Origin Ttfid',
			'relatedTTFid' => 'Related Ttfid',
			'relationType' => 'Relation Type',
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

		$criteria->compare('originTTFid',$this->originTTFid);
		$criteria->compare('relatedTTFid',$this->relatedTTFid);
		$criteria->compare('relationType',$this->relationType);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ThinkingThursdayRelated the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
