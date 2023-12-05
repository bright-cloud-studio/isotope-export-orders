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
            echo "BING BONG";
            die();
        }
    
    }

}
