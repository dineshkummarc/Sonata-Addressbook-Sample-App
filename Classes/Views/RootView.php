<?php
//
//  RootView.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

class RootView extends UIView {
    
    public function init() {
        $this->setStylesForBrowser(UIViewStylesAnyBrowser,
                                   array(UIViewMediaProjection, UIViewMediaScreen),
                                   "styles.css")
             ->setScripts("jquery/jquery-1.4.4.min.js", "functions.js")
             ->setDescription("Test Address Book Application")
             ->setKeywords("addressbook, test");
             
        parent::init();
    }
    
    public function didAddSubview($subviews = array()) {
        // ...
    }
    
}

?>