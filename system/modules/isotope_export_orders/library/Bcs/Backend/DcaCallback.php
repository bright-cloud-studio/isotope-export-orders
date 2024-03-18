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
use Isotope\Model\Payment;
use Isotope\Model\ProductCollection\Order;
use Isotope\Model\Shipping;

class DcaCallback extends Backend
{
    // Called when clicking the "Export to CSV" button in "editAll" mode within the Orders page
    public function onLoad(DC_Table $dataContainer): void {
        
        // If our 'tl_select' form has been submitted
        if (Input::post('FORM_SUBMIT') === 'tl_select') {
            
            //If our button ID is within the submitted forms $_POST
            if (isset($_POST[OrderExporter::EXPORT_TO_CSV_BUTTON_ID])) {
                
                // Create empty arrays to hold our values
                $headers = [];
                $data = [];

                // Get all of our export configurations
                $export_configs = OrderExport::findAll();

                // Loop through each export configuration
                foreach($export_configs as $config) {

                    $max_products = 0;
                    // Figure out what the maximum amount of products in our orders is
                    foreach($_POST['IDS'] as $order_id) {
                        // Grab this order by using the ID from above
                        $order = Order::findBy('id', $order_id);
                        $ttl = count($order->getItems());
                        if($ttl > $max_products){ $max_products = $ttl; }
                    }
                    
                    // If we are including a header row
                    if($config->include_headers) {

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
                        if($config->filling_full_name) { $headers[] = 'billing_full_name'; }
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
                        if($config->shipping_full_name) { $headers[] = 'shipping_full_name'; }
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
                        /*
                        if($config->product_id) { $headers[] = 'product_id'; }
                        if($config->product_name) { $headers[] = 'product_name'; }
                        if($config->product_sku) { $headers[] = 'product_sku'; }
                        if($config->product_price) { $headers[] = 'product_price'; }
                        if($config->product_quantity) { $headers[] = 'product_quantity'; }
                        if($config->product_total) { $headers[] = 'product_total'; }
                        */
                        
                        // Add product fields for as the maximum total of products in our orders
                        for ($x = 1; $x <= $max_products; $x++) {
                            if($config->product_id) { $headers[] = 'prod_id_' . $x; }
                            if($config->product_name) { $headers[] = 'prod_name_' . $x; }
                            if($config->product_sku) { $headers[] = 'prod_sku_' . $x; }
                            if($config->product_price) { $headers[] = 'prod_price_' . $x; }
                            if($config->product_quantity) { $headers[] = 'prod_quantity_' . $x; }
                            if($config->product_total) { $headers[] = 'prod_total_' . $x; }
                        }
                        
                        
                    } // END Headers
                    
                    
                    $order_count = 0;
                    // Loop through our list of selected order IDs
                    foreach($_POST['IDS'] as $order_id) {
                        
                        // Grab this order by using the ID from above
                        $order = Order::findBy('id', $order_id);
                        $order->export_last = 'Exported';
                        $order->save();

                        /* Order Fields */
                        if($config->order_id) { $data[$order_count][] = $order->id; }
                        if($config->order_number) { $data[$order_count][] = $order->document_number; }
                        if($config->order_status) { $data[$order_count][] = $order->order_status; }
                        if($config->payment_date) { $data[$order_count][] = $order->date_paid; }
                        if($config->shipped_date) { $data[$order_count][] = $order->date_shipped; }

                        // Get payment information
                        $paymentMethod = Payment::findByPk($order->payment_id);
                        if($config->payment_method) { $data[$order_count][] = $paymentMethod->name; }
                        
                        // Get shipping information
                        $shippingMethod = Shipping::findByPk($order->shipping_id);
                        
                        
                        
                        
                        if($config->shipping_method) {

                            if($shippingMethod->fedExAllowedServices != null) {
                                 $ship = deserialize($order->checkout_info);
                                
                                $data[$order_count][] = $ship['shipping_method']['info'];
                                
                            } else {
                                $data[$order_count][] = $shippingMethod->name;
                            }
                            
                        }
                        
                        

                        if($config->subtotal) { $data[$order_count][] = $order->subtotal; }
                        if($config->subtotal_without_tax) { $data[$order_count][] = $order->tax_free_subtotal; }
                        if($config->total) { $data[$order_count][] = $order->total; }
                        if($config->total_without_tax) { $data[$order_count][] = $order->tax_free_total; }
                        if($config->currency) { $data[$order_count][] = $order->currency; }
                        if($config->order_notes) { $data[$order_count][] = $order->notes; }

                        /* Billing Address Fields */
                        $b_addr = $order->getBillingAddress();
                        if($config->billing_full_name) { $data[$order_count][] = $b_addr->firstname . ' ' . $b_addr->lastname; }
                        if($config->billing_first_name) { $data[$order_count][] = $b_addr->firstname; }
                        if($config->billing_last_name) { $data[$order_count][] = $b_addr->lastname; }
                        if($config->billing_date_of_birth) { $data[$order_count][] = $b_addr->dateOfBirth; }
                        if($config->billing_company) { $data[$order_count][] = $b_addr->company; }
                        if($config->billing_street_1) { $data[$order_count][] = $b_addr->street_1; }
                        if($config->billing_street_2) { $data[$order_count][] = $b_addr->street_2; }
                        if($config->billing_street_3) { $data[$order_count][] = $b_addr->street_3; }
                        if($config->billing_zip) { $data[$order_count][] = $b_addr->postal; }
                        if($config->billing_city) { $data[$order_count][] = $b_addr->city; }
                        if($config->billing_state) { $data[$order_count][] = $b_addr->subdivision; }
                        if($config->billing_country) { $data[$order_count][] = $b_addr->country; }
                        if($config->billing_phone) { $data[$order_count][] = $b_addr->phone; }
                        if($config->billing_email) { $data[$order_count][] = $b_addr->email; }
                        
                        /* Shipping Address Fields */
                        $s_addr = $order->getShippingAddress();
                        if($config->shipping_full_name) { $data[$order_count][] = $s_addr->firstname . ' ' . $s_addr->lastname; }
                        if($config->shipping_first_name) { $data[$order_count][] = $s_addr->firstname; }
                        if($config->shipping_last_name) { $data[$order_count][] = $s_addr->lastname; }
                        if($config->shipping_date_of_birth) { $data[$order_count][] = $s_addr->dateOfBirth; }
                        if($config->shipping_company) { $data[$order_count][] = $s_addr->company; }
                        if($config->shipping_street_1) { $data[$order_count][] = $s_addr->street_1; }
                        if($config->shipping_street_2) { $data[$order_count][] = $s_addr->street_2; }
                        if($config->shipping_street_3) { $data[$order_count][] = $s_addr->street_3; }
                        if($config->shipping_zip) { $data[$order_count][] = $s_addr->postal; }
                        if($config->shipping_city) { $data[$order_count][] = $s_addr->city; }
                        if($config->shipping_state) { $data[$order_count][] = $s_addr->subdivision; }
                        if($config->shipping_country) { $data[$order_count][] = $s_addr->country; }
                        if($config->shipping_phone) { $data[$order_count][] = $s_addr->phone; }
                        if($config->shipping_email) { $data[$order_count][] = $s_addr->email; }

                        
                        // Add our product details to the CSV file
                        $products = $order->getItems();
                        foreach($products as $prod) {
                            if($config->product_id) { $data[$order_count][] = $prod->id; }
                            if($config->product_name) { $data[$order_count][] = $prod->name; }
                            if($config->product_sku) { $data[$order_count][] = $prod->sku; }
                            if($config->product_price) { $data[$order_count][] = $prod->price; }
                            if($config->product_quantity) { $data[$order_count][] = $prod->quantity; }
                            if($config->product_total) { $data[$order_count][] = $prod->total; }
                        }
                        
                        $order_count++;
                    }
                    
                    
                    
                    
                    // START - Write to CSV file
                    
                    // Set the content type to CSV
                    header('Content-Type: text/csv; charset=utf-8');
                    // Set the response header to specify that the file should be downloaded as an attachment
                    header('Content-Disposition: attachment; filename='. $config->csv_filename .'.csv');
                    // Open a file handle for writing
                    $fp = fopen('php://output', 'w');
                    
                    // Write to our CSV file
                    if($config->include_headers) {
                        fputcsv($fp, $headers);
                    } 
                    foreach($data as $odr) {
                        fputcsv($fp, $odr);
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
