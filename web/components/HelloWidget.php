<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class HelloWidget extends Widget{
	public $message;
	
	public function init(){
		parent::init();
		if($this->message===null){
			$this->message= 'Welcome User';
		}else{
			$this->message= 'Welcome '.$this->message;
		}
	}
	
	public function run(){
		return $this->render('index',[
					'message' => $this->message,
					]);
	}
}
?>