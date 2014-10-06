<?php
class PostWidget extends CWidget {
 	
    public $crumbs = array();
    public $delimiter = ' / ';

    public function run() {
        $this->render('postWidget');
    }
 
}
?>