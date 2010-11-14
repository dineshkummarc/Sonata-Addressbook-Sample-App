<?
//
//  SettingsModel.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

class SettingsModel extends ORModel {
    
    protected $_settings = array();
    
    public $id;
    public $option_name;
    public $option_value;
    
}

function SettingsModel() {
    return new SettingsModel();
}

?>