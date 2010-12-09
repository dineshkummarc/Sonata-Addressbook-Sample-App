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
    }
    
}

?>