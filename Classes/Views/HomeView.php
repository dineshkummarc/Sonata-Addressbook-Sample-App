<?php
//
//  HomeView.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

class HomeView extends UIView {
    
    public function init() {
        $this->setLayout("HomeViewTemplate")
             ->setTitle("Hello World")
             ->setStylesForBrowser(UIViewStylesAnyBrowser,
                                   array(UIViewMediaProjection, UIViewMediaScreen),
                                   "styles.css")
             ->setStylesForBrowser(UIViewStylesIE6,
                                   array(UIViewMediaProjection, UIViewMediaScreen),
                                   "styles-ie.css")
             ->setScripts("jquery/jquery-1.4.4.min.js", "functions.js")
             // Uncomment next line if you want to minify scripts
             //->minifyScripts()
             // Uncomment next line if you want to minify styles
             //->minifyStyles()
             ->setDescription("Description")
             ->setKeywords("Keywords");
             
        parent::init();
    }
    
    public function didAddSubview($subviews = array()) {
        // ...
    }
    
}

?>