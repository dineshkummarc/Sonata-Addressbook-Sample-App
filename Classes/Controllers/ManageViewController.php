<?php
//
//  ManageViewController.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

include "Views/RootView.php";
include "Models/RecordsModel.php";

class ManageViewController extends UIViewController {
    
    /*
     * @var RecordsModel
     */
    public $model;
    public $errors;
    
    // Another example of the UIView initialization,
    // using UIViewController::init method
    public function init() {
        // Creating the view
        $this->view = new RootView();
        $this->view->initWithDelegate($this);
        $this->model = new RecordsModel();
    
        parent::init();
    }
    
    public function onInsert() {
        $this->model->fullname = STRequest::postParams()->fullname;
        $this->model->email = STRequest::postParams()->email;
        $this->model->phone = STRequest::postParams()->phone;
        $this->model->picture = new STFileUpload('picture');
        $this->errors = $this->model->insert();
        if ($this->errors == false) {
            UIFlashMessage::set("Sucessfully added");
            UIApplicationSetLocation("");
        }
    }
    
    public function addAction() {
        if (STRequest::isPost()) $this->onInsert();
        
        $this->view->setLayout("Header", "EditViewTemplate", "Footer")
                   ->setTitle("Add Record");
        
        // Render templates in buffer
        $this->bufferizeTemplates();
        $this->presentViewController();
    }
    
    public function onUpdate($id) {
        $this->model->id = $id;
        $this->model->fullname = STRequest::postParams()->fullname;
        $this->model->email = STRequest::postParams()->email;
        $this->model->phone = STRequest::postParams()->phone;
        $this->model->picture = new STFileUpload('picture');
        $this->errors = $this->model->update();
        if ($this->errors == false) {
            UIFlashMessage::set("Sucessfully updated");
            UIApplicationRefreshLocation();
        }
    }
    
    // Edit action
    public function editAction() {
        $this->model->first($this->params['id']);
        
        // if there's no such record in the database throw page not found
        if (!$this->model->id)
            throw new UI404Error('Wrong ID');
        
        // If the request is post then need to update record
        if (STRequest::isPost()) $this->onUpdate($this->model->id);
        
        $this->view->setLayout("Header", "EditViewTemplate", "Footer")
                   ->setTitle("Edit Record");
        
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