<?php

/**
 * Description of News
 *
 * @author rodnoy
 */
class News {
    
    protected $db;
    
    public function __construct($db){
        $this->db = new mysqli($db['host'],$db['user'],$db['password'],$db['name']);
    }
    
    public function create($title,$content,$date,$img){
        $query = "INSERT INTO news(title,content,date,image) VALUES('$title','$content','$date','$img')";
        if($this->db->query($query)){
            return true;
        }else{
            return false;
        }
    }
    
    public function getNewsById($id){
        $query = "SELECT * FROM news WHERE id=$id LIMIT 1";
        $result = $this->db->query($query);
        if($result){
            return $result->fetch_assoc();
        }else{
            return false;
        }
    }
    
    public function deleteNewsById($id){
        $query = "DELETE FROM news WHERE id=$id";
        if($this->db->query($query)){
            return true;
        }else{
            return false;
        }
    }
    
    public function saveNews($id,$title,$content,$date,$img=null){
	if($img){
	    $query = "UPDATE news SET title='$title',content='$content',date='$date',image='$img' WHERE id=$id";
	}else{
	    $query = "UPDATE news SET title='$title',content='$content',date='$date' WHERE id=$id";
	}
        if($this->db->query($query)){
            return true;
        }else{
            return false;
        }
    }
    
    public function getNews(){
        $query = "SELECT * FROM news";
        $result = $this->db->query($query);
        if($result){
            $news = array();
            while($item = $result->fetch_assoc()){
                $news[] = $item;                
            }
            return $news;
        }else{
            return false;
        }
    }
}
