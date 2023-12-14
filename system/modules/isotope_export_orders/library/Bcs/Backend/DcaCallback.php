<?php

/*
 * Bright Cloud Studio's Isotope Export Orders
 * Copyright (C) 2023-2024 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-export-orders
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
*/

namespace Bcs\Backend;

use Bcs\Model\OrderExport;
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
                
                $export_configs = OrderExport::findAll();
                
                foreach($export_configs as $config) {
                    
                    $max_products = 0;
                    
                    // Set the content type to CSV
                    header('Content-Type: text/csv; charset=utf-8');
                    // Set the response header to specify that the file should be downloaded as an attachment
                    header('Content-Disposition: attachment; filename='. $config->csv_filename .'.csv');
                    // Open a file handle for writing
                    $fp = fopen('php://output', 'w');
                    
                    
                    if($config->include_headers) {
                        
                        // Manually write our first line which is the table headers technically
                        $data = ['order_id', 'document_number', 'order_status', 'date_paid', 'date_shipped', 'subtotal', 'tax_free_subtotal', 'total', 'tax_free_total'];
                        
                        
                        $max_products = 2;
                        
                        for ($x = 1; $x <= $max_products; $x++) {
                            $data[] = 'prod_' . $x . '_sku';
                            $data[] = 'prod_' . $x . '_quantity';
                            $data[] = 'prod_' . $x . '_price';
                        }
                        
                        
                        fputcsv($fp, $data);
                    }
                    
                    
                    // For each ID in the post
                    foreach($_POST['IDS'] as $order_id) {
                        
                        // Grab this order by using the ID from above
                        $order = Order::findBy('id', $order_id);
                        
                        // Build out our order details
                        $data = [$order->id, $order->document_number, $order->order_status, $order->date_paid, $order->date_shipped, $order->subtotal, $order->tax_free_subtotal, $order->total, $order->tax_free_total];
                        
                        for ($x = 1; $x <= $max_products; $x++) {
                            $data[] = 123;
                            $data[] = 456;
                            $data[] = 789;
                        }
    
                        // Write to our CSV file
                        fputcsv($fp, $data);
                    }
                    
                    // Close the file handle
                    fclose($fp);
                    // Exit or we will get garbage HTML in our file
                    exit();      
                }
            }
        }
    }
}
