<?php
//
//  CommentsModel.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

class CommentsModel extends ORModel {
    
    protected $_tableName = "blog_comments";
    
    public $id;
    public $post_id;
    public $comment_author;
    public $comment_author_email;
    public $comment_author_url;
    public $comment_author_IP;
    public $comment_content;
    public $comment_approved;
    public $user_id;
    public $comment_date;
    
    /*
     @var UsersModel
    */
    public $author;
    
    public function __construct() {
        $this->author = new UsersModel();
        $this->singleMatch(array($this->author, "user_id", "id"));
    }
    
    protected function postProcess($fieldName, $value) {
        switch ($fieldName) {
            case 'comment_date':
                return date("m/d/Y h:ia", strtotime($value));
                break;
        }
        return $value;
    }
    
}

?>