<?php

namespace Bcs\Backend;

use Contao\StringUtil;

class Export
{
    public function addExportButton(array $buttons): array {
        $buttons['export_all_orders'] = '<button type="submit" name="export_all_orders" id="export_all_orders" class="tl_submit">asdf ' . StringUtil::specialchars($GLOBALS['TL_LANG']['tl_iso_product_collection']['export_all_orders']) . '</button> ';
        return $buttons;
    }
}
