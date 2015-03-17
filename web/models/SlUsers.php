<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sl_users".
 *
 * @property integer $usersId
 * @property string $email
 * @property string $password
 * @property string $salt
 * @property string $logoutKey
 * @property integer $isActivated
 * @property integer $isLoggedIn
 * @property integer $userDataFid
 * @property integer $userGroupFid
 *
 * @property SlBlogPost[] $slBlogPosts
 * @property SlLinkGroups[] $slLinkGroups
 * @property SlPastebin[] $slPastebins
 * @property SlTeams[] $slTeams
 * @property SlThinkingThursdayHosts[] $slThinkingThursdayHosts
 * @property SlTransactions[] $slTransactions
 * @property SlUserInTeam[] $slUserInTeams
 * @property SlTeams[] $teamFs
 * @property SlUserData $userDataF
 * @property SlUserGroups $userGroupF
 */
class SlUsers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sl_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password', 'salt', 'isLoggedIn', 'userDataFid', 'userGroupFid'], 'required'],
            [['isActivated', 'isLoggedIn', 'userDataFid', 'userGroupFid'], 'integer'],
            [['email'], 'string', 'max' => 255],
            [['password', 'logoutKey'], 'string', 'max' => 128],
            [['salt'], 'string', 'max' => 12],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usersId' => 'Users ID',
            'email' => 'Email',
            'password' => 'Password',
            'salt' => 'Salt',
            'logoutKey' => 'Logout Key',
            'isActivated' => 'Is Activated',
            'isLoggedIn' => 'Is Logged In',
            'userDataFid' => 'User Data Fid',
            'userGroupFid' => 'User Group Fid',
         ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlBlogPosts()
    {
        return $this->hasMany(SlBlogPost::className(), ['authorId' => 'usersId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlLinkGroups()
    {
        return $this->hasMany(SlLinkGroups::className(), ['userFid' => 'usersId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlPastebins()
    {
        return $this->hasMany(SlPastebin::className(), ['usersFid' => 'usersId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlTeams()
    {
        return $this->hasMany(SlTeams::className(), ['createdByUserFid' => 'usersId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlThinkingThursdayHosts()
    {
        return $this->hasMany(SlThinkingThursdayHosts::className(), ['hostMemberFid' => 'usersId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlTransactions()
    {
        return $this->hasMany(SlTransactions::className(), ['userId' => 'usersId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlUserInTeams()
    {
        return $this->hasMany(SlUserInTeam::className(), ['usersFid' => 'usersId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamFs()
    {
        return $this->hasMany(SlTeams::className(), ['teamId' => 'teamFid'])->viaTable('sl_user_in_team', ['usersFid' => 'usersId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDataF()
    {
        return $this->hasOne(SlUserData::className(), ['userDataId' => 'userDataFid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserGroupF()
    {
        return $this->hasOne(SlUserGroups::className(), ['userGroupId' => 'userGroupFid']);
    }
    public function saveUser($email,$passwod,$userId)
    {                   
        $salt = mcrypt_create_iv(10, MCRYPT_DEV_URANDOM);
        $users = new SlUsers();
        $users->salt = $salt;
        $users->password = md5($passwod . $salt);
        $users->userDataFid = $userId;
        $users->userGroupFid = 1;
        if ($users->save()) {
            print_r($users->email);
        }else{
            echo "propalo sve";
        }
        die();
    }
}
