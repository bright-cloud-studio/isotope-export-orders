<?php

/*
 * Bright Cloud Studio's Isotope Export Orders
 * Copyright (C) 2023-2024 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-export-orders
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
*/

/* Legends */
$GLOBALS['TL_LANG']['tl_order_export']['order_export_legend'] 	= 'Export Configuration Settings';
$GLOBALS['TL_LANG']['tl_order_export']['order_legend'] 	= 'Order Settings';
$GLOBALS['TL_LANG']['tl_order_export']['billing_address_legend'] 	= 'Billing Address Settings';
$GLOBALS['TL_LANG']['tl_order_export']['shipping_address_legend'] 	= 'Shipping Address Settings';
$GLOBALS['TL_LANG']['tl_order_export']['product_legend'] 	= 'Product Settings';

/* Config Fields */
$GLOBALS['TL_LANG']['tl_order_export']['config_name']         = array('Configuration Name', 'Enter the name for this configuration');
$GLOBALS['TL_LANG']['tl_order_export']['csv_filename']        = array('CSV Filename', 'Enter the filename for the exported CSV file');
$GLOBALS['TL_LANG']['tl_order_export']['include_headers']     = array('Include Headers', 'Include a header row in the exported CSV file');

/* Order Fields */
$GLOBALS['TL_LANG']['tl_order_export']['order_id']        = array('Order ID', 'Include the "Order ID" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['order_number']    = array('Order Number', 'Include the "Order Number" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['order_status']    = array('Order Status', 'Include the "Order Status" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['payment_date']        = array('Payment Date', 'Include the "Payment Date" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['shipped_date']        = array('Shipped Date', 'Include the "Shipped Date" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['payment_method']        = array('Payment Method', 'Include the "Payment Method" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['shipping_method']        = array('Shipping Method', 'Include the "Shipping Method" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['subtotal']        = array('Subtotal', 'Include the "Subtotal" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['subtotal_without_tax']        = array('Subtotal Without Tax', 'Include the "Subtotal Without Tax" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['total']        = array('Total', 'Include the "Total" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['total_without_tax']        = array('Total Without Tax', 'Include the "Total Without Tax" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['currency']        = array('Currency', 'Include the "Currency" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['order_notes']        = array('Order Notes', 'Include the "Order Notes" field in the exported file');

/* Billing Address Fields */
$GLOBALS['TL_LANG']['tl_order_export']['billing_full_name']        = array('Full Name', 'Include the "Full name" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['billing_first_name']        = array('First Name', 'Include the "First Name" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['billing_last_name']        = array('Last Name', 'Include the "Last Name" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['billing_date_of_birth']        = array('Date of Birth', 'Include the "Date of Birth" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['billing_company']        = array('Company', 'Include the "Company" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['billing_street_1']        = array('Address 1', 'Include the "Address 1" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['billing_street_2']        = array('Address 2', 'Include the "Address 2" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['billing_street_3']        = array('Address 3', 'Include the "Address 3" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['billing_zip']        = array('Zip Code', 'Include the "Zip Code" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['billing_city']        = array('City', 'Include the "City" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['billing_state']        = array('State', 'Include the "State" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['billing_country']        = array('Country', 'Include the "Country" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['billing_phone']        = array('Phone Number', 'Include the "Phone Number" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['billing_email']        = array('Email Address', 'Include the "Email Address" field in the exported file');

/* Shipping Address Fields */
$GLOBALS['TL_LANG']['tl_order_export']['shipping_full_name']        = array('Full Name', 'Include the "Full Name" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['shipping_first_name']        = array('First Name', 'Include the "First Name" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['shipping_last_name']        = array('Last Name', 'Include the "Last Name" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['shipping_date_of_birth']        = array('Date of Birth', 'Include the "Date of Birth" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['shipping_company']        = array('Company', 'Include the "Company" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['shipping_street_1']        = array('Address 1', 'Include the "Address 1" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['shipping_street_2']        = array('Address 2', 'Include the "Address 2" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['shipping_street_3']        = array('Address 3', 'Include the "Address 3" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['shipping_zip']        = array('Zip Code', 'Include the "Zip Code" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['shipping_city']        = array('City', 'Include the "City" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['shipping_state']        = array('State', 'Include the "State" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['shipping_country']        = array('Country', 'Include the "Country" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['shipping_phone']        = array('Phone Number', 'Include the "Phone Number" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['shipping_email']        = array('Email Address', 'Include the "Email Address" field in the exported file');

/* Product Fields */
$GLOBALS['TL_LANG']['tl_order_export']['product_id']          = array('Product ID', 'Include the "Product ID" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['product_name']        = array('Product Name', 'Include the "Product Name" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['product_sku']         = array('Product SKU', 'Include the "Product SKU" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['product_price']                = array('Product Price', 'Include the "Product Price" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['product_quantity']    = array('Product Quantity', 'Include the "Product Quantity" field in the exported file');
$GLOBALS['TL_LANG']['tl_order_export']['product_total']                = array('Product Total', 'Include the "Product Total" field in the exported file');

/* Buttons */
$GLOBALS['TL_LANG']['tl_order_export']['new']   		 	  = array('New record', 'Add a new record');
$GLOBALS['TL_LANG']['tl_order_export']['show']  		      = array('Record details', 'Show the details of record ID %s');
$GLOBALS['TL_LANG']['tl_order_export']['edit']  		 	  = array('Edit record', 'Edit record ID %s');
$GLOBALS['TL_LANG']['tl_order_export']['copy']  		 	  = array('Copy record', 'Copy record ID %s');
$GLOBALS['TL_LANG']['tl_order_export']['delete'] 			  = array('Delete record', 'Delete record ID %s');
