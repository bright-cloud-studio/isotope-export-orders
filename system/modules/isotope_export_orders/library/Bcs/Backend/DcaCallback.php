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
        
        // If our 'tl_select' form has been submitted
        if (Input::post('FORM_SUBMIT') === 'tl_select') {
            //If our button ID is within the submitted forms $_POST
            if (isset($_POST[OrderExporter::EXPORT_TO_CSV_BUTTON_ID])) {
                // Replace default 'select' action with 'print' action.
                $this->redirect(str_replace('act=select', 'key=' . OrderExporter::EXPORT_TO_CSV_ACTION_NAME, Environment::get('request')));
            }
        }

        // If the act is our custom one
        if (Input::get('key') === OrderExporter::EXPORT_TO_CSV_ACTION_NAME) {
            $documentPrinter = new OrderExporter();
            return $documentPrinter->exportAll();
        }
    
    }

}
