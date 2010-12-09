<?php
//
//  Blog_PostsModel.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

class BlogArchivesModel extends ORModel {
    
    public $month;
    public $year;
    
    public function all() {
        $q = "SELECT MONTH(post_date) as month, YEAR(post_date) as year
              FROM `blog_posts` GROUP BY YEAR(post_date), MONTH(post_date)
              ORDER BY YEAR(post_date) DESC, MONTH(post_date) DESC";
        return $this->custom($q);
    }
    
}

class Blog_PostsModel extends ORModel {
    
    public $id;
    public $post_date;
    public $post_author;
    public $post_title;
    public $post_excerpt;
    public $post_content;
    public $post_status;
    public $comment_status;
    public $post_name;
    public $post_modified;
    public $comment_count;
    public $post_meta_description;
    public $post_meta_keywords;
    public $post_meta_title;
    
    /*
     @var CommentsModel
    */
    public $comments;
    
    /*
     @var UsersModel
    */
    public $author;
  
    public function __construct() {
        $this->comments = new CommentsModel();
        $this->comments->multipleMatch($this, "id", "post_id", "ORDER BY comment_date DESC");
        
        $this->author = new UsersModel();
        $this->singleMatch(array($this->author, "post_author", "id"));
          
    }
}

?>