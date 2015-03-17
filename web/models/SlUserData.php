<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sl_user_data".
 *
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
 * @property string $user_profile
 *
 * @property SlUploads $avatarUploadF
 * @property SlUserDataHasCvData[] $slUserDataHasCvDatas
 * @property SlUsersCvData[] $userDataCvFs
 * @property SlUsers[] $slUsers
 */
class SlUserData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sl_user_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registrationDate', 'user_profile'], 'required'],
            [['registrationDate', 'lastLoginDate', 'avatarUploadFid'], 'integer'],
            [['firstName', 'lastName'], 'string', 'max' => 30],
            [['lastLoginIP'], 'string', 'max' => 80],
            [['facebookLink', 'twitterLink', 'linkedInLink', 'googlePlusLink', 'aboutMeLink'], 'string', 'max' => 255],
            [['user_profile'], 'string', 'max' => 200],
            [['avatarUploadFid'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userDataId' => 'User Data ID',
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
            'user_profile' => 'User Profile',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvatarUploadF()
    {
        return $this->hasOne(SlUploads::className(), ['uploadsId' => 'avatarUploadFid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlUserDataHasCvDatas()
    {
        return $this->hasMany(SlUserDataHasCvData::className(), ['userDataFid' => 'userDataId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDataCvFs()
    {
        return $this->hasMany(SlUsersCvData::className(), ['usersCvDataId' => 'userDataCvFid'])->viaTable('sl_user_data_has_cv_data', ['userDataFid' => 'userDataId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlUsers()
    {
        return $this->hasMany(SlUsers::className(), ['userDataFid' => 'userDataId']);
    }
}
