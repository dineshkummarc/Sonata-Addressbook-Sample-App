<?php
//
//  HomeViewController.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

include "Views/RootView.php";
include "Models/RecordsModel.php";

class HomeViewController extends UIViewController {
    
    public $model;
    
    public function indexAction() {
        // Creating the view
        $this->view = new RootView();
        $this->view->initWithDelegate($this)
                   ->setLayout("Header", "HomeViewTemplate", "Footer")
                   ->setTitle("Home");
        
        // Gettings all values from the model
        $this->model = new RecordsModel();
        $this->model->all("?", "ORDER BY fullname ASC");
        
        // Render templates in buffer
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