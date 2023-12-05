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

use Contao\StringUtil;

class ButtonCallback
{

    // Adds the "Export to CSV" button to the "editAll" mode on the 'Orders' page
    public function addExportButton(array $buttons): array {
        $buttons['export_all_orders'] = '<button type="submit" name="export_to_csv" id="export_to_csv" class="tl_submit">' . StringUtil::specialchars($GLOBALS['TL_LANG']['tl_iso_product_collection']['export_all_orders']) . '</button> ';
        return $buttons;
    }
    
}
