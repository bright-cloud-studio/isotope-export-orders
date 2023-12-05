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

use Contao\Controller;
use Contao\CoreBundle\Monolog\ContaoContext;
use Contao\Environment;
use Contao\Input;
use Contao\Message;
use Contao\SelectMenu;
use Contao\StringUtil;
use Contao\System;
use Isotope\Frontend;
use Isotope\Model\ProductCollection\Order;

class OrderExporter {

    /** The 'print all documents' form id */
    protected const EXPORT_TO_CSV_FROM_ID = 'isotope_export_to_csv';

    /** The 'print all documents' button id */
    public const XPORT_TO_CSV_BUTTON_ID = 'export_to_csv';

    /** The 'print all documents' action name */
    public const XPORT_TO_CSV_ACTION_NAME = 'exportToCSV';

}
