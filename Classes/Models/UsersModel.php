<?php
//
//  UsersModel.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

class UsersModel extends ORModel {
  
  protected $_primaryKey = 'id';
  
  public $id;
  public $username;
  public $password;
  public $email;
  public $date_registered;
  public $date_accessed;
  public $activated;
  public $logincount;
  public $failedlogincount;
  public $role;
  public $timezone;
  
  public function logIn($remember = true) {
      $email = $this->email;
      $this->first("WHERE email = '?' AND password = '?' LIMIT 1", $this->email, md5(STRegistry::get("Encryption_Key") . $this->password));
      
      if (($this->activated == 0) && ($this->id > 0)) return -1;
      
      if ($this->id > 0) {
          $this->date_accessed = (string) STDateNow();
          $this->logincount++;
          $this->update();
          
          $session = new SessionsModel();
          $session->user_id = $this->id;
          $session->hash = md5(microtime());
          $session->insert();
          
          STCookie::cookieWithProperties("sessionId", $session->hash, ($remember)?3600 * 24 * 31:0);
          
          return $this->id;
      } else {
          $user = new UsersModel();
          $user->first("WHERE email = '?' LIMIT 1", $email);
          if ($user->id > 0) {
              $user->failedlogincount++;
              $user->update();
          }
          return 0;
      }
  }
  
  public function signUp() {
      $password = md5(STRegistry::get("Encryption_Key") . $this->password);
      $this->password = $password;
      $this->activated = 1;
      $this->date_registered = (string) STDateNow();
      $this->onDuplicate(IGNORE);
      $this->insert();
      $this->password = $password;
      $id = DB::getLastInsertId();
      if ($id <= 0)
          return 0;
      
      return $id;
  }
  
  public function logOut($destroy_session = true) {
      STCookie::deleteCookie("sessionId");
      if ($destroy_session) STSession::destroy();
  }
  
  public function findBySession() {
      $sessionId = STCookie::getCookie('sessionId');
      if ($sessionId) {
          $session = new SessionsModel();
          $session->first($sessionId);
          if ($session->user->id > 0) {
              return $session->user;
          } else
            return NULL;
      } else
        return NULL;
  }
  
  public function findByUsername($username) {
      $model = new UsersModel();
      $model->first("WHERE username = '?' LIMIT 1", $username);
      return $model;
  }
  
  public function findByEmail($email) {
      $model = new UsersModel();
      $model->first("WHERE email = '?' LIMIT 1", $email);
      return $model;
  }
  
  public function doesUsernameExist($username) {
      $user = $this->findByUsername($username);
      if (!$this->id) {
          return ($user->username == $username);
      }
      if (!$user->id) return false;
      return ($user->id != $this->id);
  }
  
  public function doesEmailExist($email) {
      $user = $this->findByEmail($email);
      if (!$this->id) {
          return ($user->email == $email);
      }
      if (!$user->id) return false;
      return ($user->id != $this->id);
  }
  
}

class User {
  
    final private function __construct() {}
    final private function __clone() {}
  
    public static function logIn($email, $password, $remember = true) {
        $user = new UsersModel();
        $user->email = $email;
        $user->password = $password;
        return $user->logIn($remember);
    }
    
    public static function logOut() {
        $user = new UsersModel();
        $user->logOut();
    }
    
    public static function profile($id = 0) {
        $user = new UsersModel();
        if ($id > 0) return $user->first($id);
        return $user->findBySession();
    }
    
    public static function hasProfile($id = 0) {
        $user = new UsersModel();
        if ($id > 0) {
            $user->first($id);
            return (bool) ($user->id == $id);
        }
        return (bool) $user->findBySession();
    }
  
}

?>