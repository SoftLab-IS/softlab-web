<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	const ERROR_USER_NOT_ACTIVATED = 3;
	
	/**
	 * Authenticates a user.
	 * 
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = Users::model()->findByAttributes(array('email' => $this->username)); 
		
		if (($user != NULL) && ($user->password === md5($this->password . $user->salt)))
		{
			if ($user->isActivated == 0)
				$this->errorCode = self::ERROR_USER_NOT_ACTIVATED;
			else
			{
				Yii::app()->session["userId"] = $user->usersId;
				
				if (!empty($user->userDataF->firstName))
				{
					Yii::app()->session["name"] = $user->userDataF->firstName . (!empty($user->userDataF->lastName) ? ' ' . $user->userDataF->lastName : '');
				}
				else
				{
					Yii::app()->session["name"] = $user->email;
				}
				
				$this->username = Yii::app()->session["name"];
				
				
				Yii::app()->session["alreadyLoggedOnce"] = false;
				
				if ($user->isLoggedIn == 1)
				{
					Yii::app()->session["alreadyLoggedOnce"] = true;
					
					if (!empty($user->logoutKey))
						Yii::app()->session["logoutKey"] = $user->logoutKey;
					else
						Yii::app()->session["logoutKey"] = md5($user->usersId . (microtime(true) + mktime()));
				}
				else
					Yii::app()->session["logoutKey"] = md5($user->usersId . (microtime(true) + mktime()));
				
				Yii::app()->session["userDataId"] = $user->userDataFid;
				Yii::app()->session["userGroupId"] = $user->userGroupFid;
				
				$user->logoutKey = Yii::app()->session["logoutkey"];
				$user->isLoggedIn = 1;
				
				$user->save();
				
				Yii::app()->session["frontendAccess"] = CJSON::decode($user->userGroupF->frontendAccess, true);
				Yii::app()->session["backendAccess"] = CJSON::decode($user->userGroupF->backendAccess, true);
				
				$this->errorCode = self::ERROR_NONE;
			}
		}
		else
		{
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}
		
		return !$this->errorCode;
	}
}
