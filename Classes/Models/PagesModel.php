<?
//
//  PagesModel.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

class PagesModel extends ORModel {
    
    protected $_tableName = "content_pages";
    protected $_settings = array();
    
    public $id;
    public $page_author;
    public $page_date;
    public $page_content;
    public $page_title;
    public $page_status;
    public $page_name;
    public $page_modified;
    
    public $page_meta_description;
    public $page_meta_keywords;
    public $page_meta_title;
    
    /*
     @var UsersModel
    */
    public $author;
    
    public function __construct() {
        $this->author = new UsersModel();
        $this->singleMatch(array($this->author, "page_author", "id"));
    }
    
    protected function postProcess($fieldName, $value) {
        switch ($fieldName) {
            case 'page_modified':
                return date("m/d/Y h:ia", strtotime($value));
                break;
        }
        return $value;
    }
    
    
}

?>