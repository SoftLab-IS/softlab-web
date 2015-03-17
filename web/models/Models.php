<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
/**
* 
*/
class Models extends Model
{
	public $search;
 	public $file;
 	public $number;
 	public $tag;
 	public $author;
 	public $category;
 	public function rules(){
 		return [
		[['search','number','tag','author','category'],	'required'],
		[['file'],'file'],

	];

 }	
}

?>