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

                // Get all of our export configurations
                $export_configs = OrderExport::findAll();

                // Loop through each export configuration
                foreach($export_configs as $config) {

                    // How many products we need to account for
                    $max_products = 0;
                    
                    // Set the content type to CSV
                    header('Content-Type: text/csv; charset=utf-8');
                    // Set the response header to specify that the file should be downloaded as an attachment
                    header('Content-Disposition: attachment; filename='. $config->csv_filename .'.csv');
                    // Open a file handle for writing
                    $fp = fopen('php://output', 'w');
                    
                    
                    
                    // If we are including a header row
                    if($config->include_headers) {

                        // Create an empty array to hold our values
                        $headers = [];
                        
                        // Ugly but this was the easier solution due to $config->arrData being protected and unreachable.
                        // Maybe I'll figure out a more programatic way to accomplish this, for now it's good enough
                        
                        /* Order Fields */
                        if($config->order_id) { $headers[] = 'order_id'; }
                        if($config->order_number) { $headers[] = 'order_number'; }
                        if($config->order_status) { $headers[] = 'order_status'; }
                        if($config->payment_date) { $headers[] = 'payment_date'; }
                        if($config->shipped_date) { $headers[] = 'shipped_date'; }
                        if($config->payment_method) { $headers[] = 'payment_method'; }
                        if($config->shipping_method) { $headers[] = 'shipping_method'; }
                        if($config->subtotal) { $headers[] = 'subtotal'; }
                        if($config->subtotal_without_tax) { $headers[] = 'subtotal_without_tax'; }
                        if($config->total) { $headers[] = 'total'; }
                        if($config->total_without_tax) { $headers[] = 'total_without_tax'; }
                        if($config->currency) { $headers[] = 'currency'; }
                        if($config->order_notes) { $headers[] = 'order_notes'; }
                        
                        /* Billing Address Fields */
                        if($config->billing_first_name) { $headers[] = 'billing_first_name'; }
                        if($config->billing_last_name) { $headers[] = 'billing_last_name'; }
                        if($config->billing_date_of_birth) { $headers[] = 'billing_date_of_birth'; }
                        if($config->billing_company) { $headers[] = 'billing_company'; }
                        if($config->billing_street_1) { $headers[] = 'billing_street_1'; }
                        if($config->billing_street_2) { $headers[] = 'billing_street_2'; }
                        if($config->billing_street_3) { $headers[] = 'billing_street_3'; }
                        if($config->billing_zip) { $headers[] = 'billing_zip'; }
                        if($config->billing_city) { $headers[] = 'billing_city'; }
                        if($config->billing_state) { $headers[] = 'billing_state'; }
                        if($config->billing_country) { $headers[] = 'billing_country'; }
                        if($config->billing_phone) { $headers[] = 'billing_phone'; }
                        if($config->billing_email) { $headers[] = 'billing_email'; }
                        
                        /* Shipping Address Fields */
                        if($config->shipping_first_name) { $headers[] = 'shipping_first_name'; }
                        if($config->shipping_last_name) { $headers[] = 'shipping_last_name'; }
                        if($config->shipping_date_of_birth) { $headers[] = 'shipping_date_of_birth'; }
                        if($config->shipping_company) { $headers[] = 'shipping_company'; }
                        if($config->shipping_street_1) { $headers[] = 'shipping_street_1'; }
                        if($config->shipping_street_2) { $headers[] = 'shipping_street_2'; }
                        if($config->shipping_street_3) { $headers[] = 'shipping_street_3'; }
                        if($config->shipping_zip) { $headers[] = 'shipping_zip'; }
                        if($config->shipping_city) { $headers[] = 'shipping_city'; }
                        if($config->shipping_state) { $headers[] = 'shipping_state'; }
                        if($config->shipping_country) { $headers[] = 'shipping_country'; }
                        if($config->shipping_phone) { $headers[] = 'shipping_phone'; }
                        if($config->shipping_email) { $headers[] = 'shipping_email'; }
                        
                        /* Product Fields */
                        if($config->product_id) { $headers[] = 'product_id'; }
                        if($config->product_name) { $headers[] = 'product_name'; }
                        if($config->product_sku) { $headers[] = 'product_sku'; }
                        if($config->product_price) { $headers[] = 'product_price'; }
                        if($config->product_quantity) { $headers[] = 'product_quantity'; }
                        if($config->product_total) { $headers[] = 'product_total'; }

                        
                        
                        
                        // Figure out how many products we have in total and add that many product fields to account for them
                        /*
                        $max_products = 2;
                        for ($x = 1; $x <= $max_products; $x++) {
                            $data[] = 'prod_' . $x . '_sku';
                            $data[] = 'prod_' . $x . '_quantity';
                            $data[] = 'prod_' . $x . '_price';
                        }
                        */
                        
                        
                        fputcsv($fp, $headers);
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
                        //fputcsv($fp, $data);
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
