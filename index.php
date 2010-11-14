<?
//
//  index.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

define('CFAppPath', dirname(__FILE__).DIRECTORY_SEPARATOR);
define('CFDebugErrors', 'YES');

require "SonataFramework/Database.php";
require "SonataFramework/ORM.php";
require "SonataFramework/UI.php";

function main($argc = 0, $argv = array()) {
    $retVal = UIApplicationMain($argc, $argv, "NewAppDelegate");
    return $retVal;
}

?>