<?
//
//  HomeViewController.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

include "Views/HomeView.php";

class HomeViewController extends UIViewController {
    
    public function indexAction() {
        /* Creating the view */ 
        $this->view = new HomeView();
        $this->view->initWithDelegate($this);
        
        /* Render templates in buffer */
        $this->bufferizeTemplates();
        
        $this->presentViewController();
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