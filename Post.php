<?php 

class Post{

    public $id, $title, $content, $pub, $author;


    public function __construct($title, $content, $pub, $author){
         $this->title   = $title;
         $this->content = $content;
         $this->pub = $pub;
         $this->author  = $author;
    }
}


?>