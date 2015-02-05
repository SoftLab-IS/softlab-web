<?php
class PostWidget extends CWidget {
 	
    public $crumbs = array();
    public $number = 5;
    public $type = '';
    public $value = '';

    public function posts(){
    	$number = 5;
    	if ($this->type != 'category') {
    	$widgetPosts = new CDbCriteria;
		$tags = '';
		$author = '';
    	switch ($this->type) {
    		case 'tags':
    			$tags = $this->value;
    			break;
    		case 'author':
    			$author = $this->value;
    			break;
    		case 'number':
    			$number = $this->value;
    			break;
    	}
    	$widgetPosts = new CDbCriteria;
    	$widgetPosts->limit = $number;
   		$widgetPosts->compare('isVisible',1,true,'AND');
    	$widgetPosts->compare('tags',$tags,true,'AND');
    	$widgetPosts->compare('authorID',$author,true);
    	$widgetPosts->order = 'entryDate DESC';
    	$posts = BlogPost::model()->findAll($widgetPosts);
    	}else{
       		 $categoryies = BlogCategories::model()->findByPK($this->value);
           $posts = $categoryies->slBlogPosts(array('condition'=>'isVisible=1',
                                                    'order'=>'entryDate DESC'));
    	}
    	
    	return $posts;
    }

    public function run() {
        $this->render('postWidget');
    }
 
}
?>