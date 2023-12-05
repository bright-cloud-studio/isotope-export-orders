<?php

/* Callbacks */
$GLOBALS['TL_DCA']['tl_iso_product_collection']['config']['onload_callback'][] = array('Bcs\Backend\DcaCallback', 'onLoad');
$GLOBALS['TL_DCA']['tl_iso_product_collection']['select']['buttons_callback'][] = array('Bcs\Backend\Export', 'addExportButton');
