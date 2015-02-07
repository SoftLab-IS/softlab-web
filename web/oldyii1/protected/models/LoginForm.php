<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $email;
	public $password;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('email, password', 'required'),
			array('email', 'email'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if (!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->email, $this->password);
			
			if (!$this->_identity->authenticate() && ($this->_identity->errorCode != UserIdentity::ERROR_USER_NOT_ACTIVATED))
				$this->addError('password', 'Netačan email ili password.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if ($this->_identity === null)
		{
			$this->_identity = new UserIdentity($this->username, $this->password);
			$this->_identity->authenticate();
		}
		
		if ($this->_identity->errorCode === UserIdentity::ERROR_NONE)
		{
			Yii::app()->user->login($this->_identity, $this->rememberMe ? 3600 * 24 * 30 : 0);
			return true;
		}
		else if ($this->_identity->errorCode === UserIdentity::ERROR_USER_NOT_ACTIVATED)
		{
			$this->addError('password', 'Ovaj korisnik nije aktiviran.');
			return false;
		}
		else
			return false;
	}
}
