<?php

/*
 * Bright Cloud Studio's Isotope Export Orders
 * Copyright (C) 2023-2024 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-export-orders
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
*/

/* Register Classes */
ClassLoader::addClasses(array
(
    // Class that contains all of our functionality for the Isotope Hooks
    'Bcs\Backend\ButtonCallback'       => 'system/modules/isotope_export_orders/library/Bcs/Backend/ButtonCallback.php',
    'Bcs\Backend\DcaCallback'          => 'system/modules/isotope_export_orders/library/Bcs/Backend/DcaCallback.php',
    'Bcs\Backend\OrderExporter'        => 'system/modules/isotope_export_orders/library/Bcs/Backend/OrderExporter.php',
    'Bcs\Model\OrderExport'            => 'system/modules/isotope_export_orders/library/Bcs/Model/OrderExport.php'
));
