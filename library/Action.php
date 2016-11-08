<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Action
 *
 * @author rodnoy
 */
class Action {
 
    protected $news_editor;
    protected $template_name;
    
    public function __construct($template,$db){
        $this->template_name = $template;
        $this->news_editor = new News($db);
    }
    
    protected function redirect(){
        header("Location:".$_SERVER['PHP_SELF']);
    }
    
    public function shownews(){
        $title = "News list";
        $layout_name = "layout/news.php";
        $news = $this->news_editor->getNews();
        include_once $this->template_name;
    }
    
    public function editform(){
        $id = filter_input(INPUT_POST,'id');
        if($id){
            $title = 'Edit news';
            $layout_name = "layout/edit.php";
            $news = $this->news_editor->getNewsById($id);
            include_once $this->template_name;
        }else{
            $this->redirect();
        }
    }
    
    public function save(){
        $id = filter_input(INPUT_POST, 'id');
        $title = filter_input(INPUT_POST, 'title');
        $content = filter_input(INPUT_POST, 'content');
        $date = time();        
        //$img = filter_input(INPUT_POST, 'img');
        
        $file = $_FILES['image'];
	if($_FILES['image']['name']!=''){
	    $path_img = "images/".$file['name'];
	    //exit(var_dump($_FILES['image']));
	    move_uploaded_file($file['tmp_name'], $path_img);
	}
        if (!empty($id) && !empty($title) && !empty($content)) {
            $this->news_editor->saveNews($id, $title, $content, $date, $path_img);
        }
        $this->redirect();
    }
    
    public function createform(){
        $title = "Create new news";
        $layout_name = "layout/create.php";
        include_once $this->template_name;
    }
    
    public function create(){
        $title = filter_input(INPUT_POST,'title');
        $content = filter_input(INPUT_POST,'content');
        $date = time();
        $file = $_FILES['image'];
        $path_img = "images/".$file['name'];
        move_uploaded_file($file['tmp_name'], $path_img);
        
        if (!empty($title) && !empty($content) && !empty($date) && !empty($path_img)) {
            $this->news_editor->create($title, $content, $date, $path_img);
        }
        $this->redirect();
    }
    
    public function delete() {
        $id = filter_input(INPUT_POST, 'id');
		//var_dump($_POST);
        if ($id) {
            $this->news_editor->deleteNewsById($id);
        }
        $this->redirect();
    }
    
    
}
    
