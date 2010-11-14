<?
//
//  SessionsModel.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

class SessionsModel extends ORModel {
  
  protected $_primaryKey = 'hash';
  
  public $user_id;
  public $hash;
  public $user;
  
  public function __construct() {
      $this->user = new UsersModel();
      $this->singleMatch(array($this->user, "user_id", "id"));
  }
  
}

?>