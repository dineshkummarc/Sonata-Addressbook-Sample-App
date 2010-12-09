<?php
//
//  NewAppDelegate.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

require "Application/Router.php";

class NewAppDelegate extends UIApplication {

    public function applicationWillRun() {
        $dictionary = STDictionary()->initWithContentsOfFile("Info.plist");
        
        // Load configuration
        UIApplication::sharedApplication()->settingsFromObject($dictionary);
        
        // Set up database connection
        DB::useDriver('MySQL');
        DB::defaultConnectionFromObject($this->settings
                                             ->environment
                                             ->MySQL);
                        
        // Load default settings into STRegistry
        STRegistry::settingsFromObject($this->settings
                                            ->environment
                                            ->Registry);
        
        Router::setDefaultRoutes();

        // Run the application
        UIApplication::sharedApplication()->applicationRun();
    }
    
    public function applicationDidFinishLaunching() {
        UIApplication::handleRoutesWithRouter('Router');
        parent::applicationDidFinishLaunching();
    }
    
    // Called when the application is about to terminate.
    public function applicationWillTerminate() {
        parent::applicationWillTerminate();
    }
    
    public function didReceiveCriticalError(STNotification $notification) {
        parent::didReceiveCriticalError($notification);
    }
    
    public function didReceiveException(STNotification $notification) {
        parent::didReceiveException($notification);
    }
}

?>