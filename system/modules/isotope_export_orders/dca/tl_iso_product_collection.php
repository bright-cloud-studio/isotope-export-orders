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

 /* Extend the tl_user palettes */
$GLOBALS['TL_DCA']['tl_iso_product_collection']['list']['label']['fields'][''] = 'export_last';

$GLOBALS['TL_DCA']['tl_iso_product_collection']['list']['label']['label_callback'] = array('Bcs\Backend\OrderExporter', 'getOrderLabel');


//$GLOBALS['TL_DCA']['tl_iso_product_collection']['list']['sorting']['filter'] = array('Bcs\Backend\OrderExporter', 'getOrderLabel');




/* Add new fields */
$GLOBALS['TL_DCA']['tl_iso_product_collection']['fields']['export_last'] = array
(
    'label'                 => &$GLOBALS['TL_LANG']['tl_iso_product_collection']['export_last'],
    'filter'                => true,
    'inputType'             => 'radio',
    'options'               => array('Exported' => 'Exported', 'Not Exported' => 'Not Exported'),
    'eval'                  => array('tl_class'=>'w50'),
    'sql'                   => "varchar(32) NOT NULL default 'Not Exported'"
);

/* Register new global operation */
$GLOBALS['TL_DCA']['tl_iso_product_collection']['list']['global_operations']['order_export'] = array
(
    'label'                   => 'Configure Exports',
    'href'                    => 'do=order_export',
    'icon' => 'modules'
);
