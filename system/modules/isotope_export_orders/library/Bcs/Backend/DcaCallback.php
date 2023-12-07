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

                // STEP ONE: Use the IDs in $_POST to get our orders

                print_r($_POST);
                

                // STEP TWO: Assemble our CSV string by looping through those orders

                // STEP THREE: Push that string to a file and have the user download it

                // STEP FOUR: PEACE



                // Replace default 'select' action with 'print' action.
                //$this->redirect(str_replace('act=select', 'key=' . OrderExporter::EXPORT_TO_CSV_ACTION_NAME, Environment::get('request')));
            }
        }

        /*
        // Use this to change things based on the key
        if (Input::get('key') === OrderExporter::EXPORT_TO_CSV_ACTION_NAME) {

            foreach($_POST as $key => $value)
            {
                echo "KEY: " . $key . " - VALUE: " . $value . "<br>";
            }
            
            echo "HIT!";
        }
        */
    
    }

}
