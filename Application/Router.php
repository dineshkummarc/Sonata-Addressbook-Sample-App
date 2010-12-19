<?php
//
//  Router.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

class Router extends STRouter {
    
    public static function setDefaultRoutes() {
        self::init();
        self::map('/', array('controller' => 'Home'));
        self::map('/ajax', array('controller' => 'Ajax'));
        self::map('/add', array('controller' => 'Manage', 'action' => 'add'));
        self::map('/edit/:id', array('controller' => 'Manage', 'action' => 'edit'),
                               array('id' => '[\d]{1,8}'));
        self::map('/delete/:id', array('controller' => 'Manage', 'action' => 'add'),
                                 array('id' => '[\d]{1,8}'));
    }
    
}

?>