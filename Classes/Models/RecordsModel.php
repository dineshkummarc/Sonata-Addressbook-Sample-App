<?php
//
//  RecordsModel.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

class RecordsModel extends ORModel {
    
    public $id;
    public $fullname;
    public $email;
    public $phone;
    public $picture;
    public $created_at;
    public $modified_at;
    
    private $errors;
    
    
    // Validation function
    private function validate() {
        $errors = array();
        if ($this->fullname == '')
            $errors['fullname'] = 'Please enter your full name.';
            
        if (!STValidate::email($this->email))
            $errors['email'] = 'Please enter a valid email.';
    
        if (!STValidate::phone($this->phone))
            $errors['phone'] = 'Please enter a valid phone number.';
        
        if ($this->picture->isUploaded()) {
            $imageType = NULL;
            if (STImage::fileIsImage($this->picture->path, &$imageType)) {
                $fileName = md5(microtime()).".".CFFileExtension($this->picture->name);
                STImage::resizeImageProportional(100, 100, $this->picture->path,
                                                $imageType, CFAppPath."Uploads/".$fileName);
                $this->picture = $fileName;
            } else {
                $errors['picture'] = 'Please upload a valid picture.';
            }
        }

        return ($errors) ? $errors : NULL;
    }
    
    public function insert() {
        $this->created_at = $this->modified_at = (string) STDateNow(); 
        if (($this->errors = $this->validate()) !== NULL)
            return $this->errors;
        
        parent::insert();
        // return false if there are no errors
        return false;
    }
    
    public function update() {
        $this->modified_at = (string) STDateNow(); 
        if (($this->errors = $this->validate()) !== NULL)
            return $this->errors;
        
        parent::update();
        // return false if there are no errors
        return false;
    }
    
    protected function postProcess($fieldName, $value) {
        switch ($fieldName) {
            case 'created_at':
            case 'modified_at':
                return date("m/d/Y h:ia", strtotime($value));
                break;
        }
        return $value;
    }
    
}

?>