<?php

use Bcs\Backend\ButtonCallback;
use Bcs\Backend\DcaCallback;

/* Callbacks */
$GLOBALS['TL_DCA']['tl_iso_product_collection']['config']['onload_callback'][] = [DcaCallback::class, 'onLoad'];
$GLOBALS['TL_DCA']['tl_iso_product_collection']['select']['buttons_callback'][] = [ButtonCallback::class, 'addExportButton'];
