<?php

/**
 * Bright Cloud Studio's Isotope Export Orders
 *
 * Copyright (C) 2023-2024 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-export-orders
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
**/

namespace Bcs\Backend;

use Contao\Backend;
use Contao\DC_Table;
use Contao\Environment;
use Contao\Input;

class DcaCallback extends Backend
{

    // Called when clicking the "Export to CSV" button in "editAll" mode within the Orders page
    public function onLoad(DC_Table $dataContainer): void {
        
        // Is available after button submission.
        if (Input::post('FORM_SUBMIT') === 'tl_select') {
            
            if (isset($_POST[DocumentPrinter::PRINT_ALL_DOCUMENTS_BUTTON_ID])) {
                // Replace default 'select' action with 'print' action.
                $this->redirect(str_replace('act=select', 'act=' . DocumentPrinter::PRINT_ALL_DOCUMENTS_ACTION_NAME, Environment::get('request')));
            }
        }
    
    }

}
