<?
//
//  E404ViewController.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

class E404ViewController extends UIViewController {
  
    public function indexAction() {
        UIApplication::sharedApplication()->sendHeader(UIApplication404Header);
        echo 'Page Not Found';
    }
    
    // Implement viewDidLoad to do additional setup after loading the view, typically from a phtml.
    public function viewDidLoad() {
        parent::viewDidLoad();
    }
    
    //  Implement viewDidLoad to do additional setup after unloading the view.
    public function viewDidUnLoad() {
        parent::viewDidUnLoad();
    }
    
}

?>