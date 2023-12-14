<?php

/*
 * Bright Cloud Studio's Isotope Export Orders
 * Copyright (C) 2023-2024 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-export-orders
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
*/
 
/* Table tl_location */
$GLOBALS['TL_DCA']['tl_order_export'] = array
(
    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'enableVersioning'            => true,
        'sql' => array
        (
            'keys' => array
            (
                'id' 	=> 	'primary'
            )
        )
    ),
    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'                    => 1,
            'fields'                  => array('config_name'),
            'flag'                    => 1,
            'panelLayout'             => 'filter;search,limit'
        ),
        'label' => array
        (
            'fields'                  => array('config_name', 'csv_filename'),
            'format'                  => '%s (%s)'
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations' => array
        (
            'edit' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_order_export']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.gif'
            ),
			
            'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_order_export']['copy'],
                'href'                => 'act=copy',
                'icon'                => 'copy.gif'
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_order_export']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
            'show' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_location']['show'],
                'href'                => 'act=show',
                'icon'                => 'show.gif'
            )
        )
    ),
    // Palettes
    'palettes' => array
    (
        'default'                     => '{order_export_legend},config_name,csv_filename,include_headers;{order_legend},order_id, order_number, order_status;{product_legend},product_id, product_name, product_sku, product_quantity;'
    ),
    // Fields
    'fields' => array
    (
        'id' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
            'sorting' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        // CONFIG SETTINGS
        'config_name' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['config_name'],
            'inputType'               => 'text',
            'default'		          => '',
            'search'                  => true,
            'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'csv_filename' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['csv_filename'],
            'inputType'               => 'text',
            'default'		          => '',
            'search'                  => true,
            'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'include_headers' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['include_headers'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),




        
        // ORDER SETTINGS
        'order_id' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['order_id'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'order_number' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['order_number'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'order_status' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['order_status'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),

        'payment_date' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['payment_date'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'shipped_date' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['shipped_date'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'order_status' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['order_status'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'payment_method' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['payment_method'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'shipping_method' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['shipping_method'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'subtotal' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['subtotal'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'subtotal_without_tax' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['subtotal_without_tax'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'total' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['total'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'total_without_tax' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['total_without_tax'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'currency' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['currency'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'order_notes' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['order_notes'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        





        // BILLING ADDRESS SETTINGS
        'billing_first_name' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['billing_first_name'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'billing_last_name' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['billing_last_name'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'billing_date_of_birth' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['billing_date_of_birth'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'billing_company' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['billing_company'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'billing_street_1' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['billing_street_1'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'billing_street_2' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['billing_street_2'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'billing_street_3' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['billing_street_3'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'billing_zip' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['billing_zip'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'billing_city' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['billing_city'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'billing_state' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['billing_state'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'billing_country' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['billing_country'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'billing_phone' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['billing_phone'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'billing_email' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['billing_email'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),




        // SHIPPING ADDRESS SETTINGS
        'shipping_first_name' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['shipping_first_name'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'shipping_last_name' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['shipping_last_name'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'shipping_date_of_birth' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['shipping_date_of_birth'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'shipping_company' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['shipping_company'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'shipping_street_1' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['shipping_street_1'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'shipping_street_2' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['shipping_street_2'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'shipping_street_3' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['shipping_street_3'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'shipping_zip' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['shipping_zip'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'shipping_city' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['shipping_city'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'shipping_state' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['shipping_state'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'shipping_country' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['shipping_country'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'shipping_phone' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['shipping_phone'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'shipping_email' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['shipping_email'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),


        


        
        // PRODUCT SETTINGS
        'product_id' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['product_id'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'product_name' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['product_name'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'product_sku' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['product_sku'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'product_price' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['product_price'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'product_quantity' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['product_quantity'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'product_total' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_order_export']['product_total'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
    )
);
