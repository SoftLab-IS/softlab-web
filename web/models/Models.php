<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
* 
*/
class Models extends Model
{
	public $search;
 
 	public function rules(){
 		return [
		['search',	'required']
	];

 }	
}

?>