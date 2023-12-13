<?php

use Bcs\Backend\ButtonCallback;
use Bcs\Backend\DcaCallback;

/* Callbacks */
$GLOBALS['TL_DCA']['tl_iso_product_collection']['config']['onload_callback'][] = [DcaCallback::class, 'onLoad'];
$GLOBALS['TL_DCA']['tl_iso_product_collection']['select']['buttons_callback'][] = [ButtonCallback::class, 'addExportButton'];

/* Custom Fields */
$GLOBALS['TL_DCA']['tl_iso_product_collection']['fields']['export_last'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_iso_product_collection']['export_last'],
    'inputType'               => 'text',
    'default'                 => '0',
    'search'                  => true,
    'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''",
);





$GLOBALS['TL_DCA']['tl_iso_product_collection']['list']['global_operations']['order_export'] = array
(
    'label'                   => 'Configure Exports',
    'href'                    => 'do=order_export',
    'icon' => 'modules'
);
