<?php
//
//  AjaxViewController.php
//  __APPLICATION_NAME__
//
//  Created by __AURTHOR__ on __DATE__.
//  Copyright __COMPANY__ __YEAR__. All rights reserved.
//

class AjaxViewController extends UIAjaxController {
    
    public function removeRecord() {
        $model = new RecordsModel();
        $model->delete(STRequest::getParams()->id);
    }
    
}

?>