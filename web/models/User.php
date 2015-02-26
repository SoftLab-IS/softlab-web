<?php

namespace app\models;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $usersId;
    public $email;
    public $salt;
    public $logoutKey;
    public $isActivated;
    public $isLoggedIn;
    public $userDataFid;
    public $userGroupFid;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
       $user = SlUsers::find()->where(['usersId' => $id])->with('userDataF')->one();
       if (!count($user)) {
           return null;
       }else{
        return new static($user);
       }
       // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        echo $token;
        die();
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = SlUsers::find()->where(['email' => $username])->one();
        if (!count($user)) {
            return null;
        }
        return new static($user);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->usersId;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->logoutKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {   
        return $this->logoutKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password. $this->salt);
    }
}
