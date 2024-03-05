<?php

/*
 * Bright Cloud Studio's Isotope Export Orders
 * Copyright (C) 2023-2024 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-export-orders
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
*/

use Bcs\Backend\ButtonCallback;
use Bcs\Backend\DcaCallback;

/* Callbacks */
$GLOBALS['TL_DCA']['tl_iso_product_collection']['config']['onload_callback'][] = [DcaCallback::class, 'onLoad'];
$GLOBALS['TL_DCA']['tl_iso_product_collection']['select']['buttons_callback'][] = [ButtonCallback::class, 'addExportButton'];
$GLOBALS['TL_DCA']['tl_iso_product_collection']['list']['label']['fields']['label_callback'] = array('Bcs\Backend\OrderExporter', 'getOrderLabel');


 /* Extend the tl_user palettes */
$GLOBALS['TL_DCA']['tl_iso_product_collection']['list']['label']['fields'][''] = 'export_last';



/* Add new fields */
$GLOBALS['TL_DCA']['tl_iso_product_collection']['fields']['export_last'] = array
(
    'label'                 => &$GLOBALS['TL_LANG']['tl_iso_product_collection']['export_last'],
    'sql'                   =>  "int(10) unsigned NOT NULL default '0'"
);

/* Register new global operation */
$GLOBALS['TL_DCA']['tl_iso_product_collection']['list']['global_operations']['order_export'] = array
(
    'label'                   => 'Configure Exports',
    'href'                    => 'do=order_export',
    'icon' => 'modules'
);
