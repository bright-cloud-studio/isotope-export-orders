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

use Isotope\Model\ProductCollection\Order;

class DcaCallback extends Backend
{

    // Called when clicking the "Export to CSV" button in "editAll" mode within the Orders page
    public function onLoad(DC_Table $dataContainer): void {
        
        // If our 'tl_select' form has been submitted
        if (Input::post('FORM_SUBMIT') === 'tl_select') {
            
            //If our button ID is within the submitted forms $_POST
            if (isset($_POST[OrderExporter::EXPORT_TO_CSV_BUTTON_ID])) {
                
                // Set the content type to CSV
                header('Content-Type: text/csv; charset=utf-8');
                // Set the response header to specify that the file should be downloaded as an attachment
                header('Content-Disposition: attachment; filename=data.csv');
                // Open a file handle for writing
                $fp = fopen('php://output', 'w');
                
                
                // For each ID in the post
                foreach($_POST['IDS'] as $order_id) {
                    
                    // Grab this order by using the ID from above
                    $order = Order::findBy('id', $order_id);
                    
                    // Build out our order details
                    $data = [$order->id, $order->document_number, $order->order_status, $order->date_paid, $order->date_shipped, $order->subtotal, $order->tax_free_subtotal, $order->total, $order->tax_free_total];

                    // Write to our CSV file
                    fputcsv($fp, $data);
                    
                }
                
                // Close the file handle
                fclose($fp);
                // Exit or we will get garbage HTML in our file
                exit();

                // Replace default 'select' action with 'print' action.
                //$this->redirect(str_replace('act=select', 'key=' . OrderExporter::EXPORT_TO_CSV_ACTION_NAME, Environment::get('request')));
            }
        }

        // Use this to change things based on the key
        /*
        if (Input::get('key') === OrderExporter::EXPORT_TO_CSV_ACTION_NAME) {
            print_r($_POST);
            echo "KEY!";
        }
        */
        
    }

}
