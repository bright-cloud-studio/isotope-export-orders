<?php

/*
 * Bright Cloud Studio's Isotope Export Orders
 * Copyright (C) 2023-2024 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-export-orders
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
*/

/* Backend Modules */
$GLOBALS['BE_MOD']['isotope']['order_export'] = array(
  'tables' => array('tl_order_export'),
  'icon'   => 'system/modules/contao_brand_manager/assets/icons/brand.png'
);

/* Models */
$GLOBALS['TL_MODELS']['tl_order_export'] = 'Bcs\Model\OrderExport';
