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
    public const EXPORT_TO_CSV_BUTTON_ID = 'export_to_csv';

    /** The 'print all documents' action name */
    public const EXPORT_TO_CSV_ACTION_NAME = 'exportToCSV';

    /** The monolog logger */
    protected $logger;

    /** The url of the current request */
    protected $currentRequestUrl;



    public function __construct() {
        $this->logger = System::getContainer()->get('monolog.logger.contao');
        $this->currentRequestUrl = Environment::get('request');
    }


     public function exportToCSV() {
         
        $this->redirectUrl = $this->getRedirectUrl();

        // If form id is available, the form has been sent.
        if (Input::post('FORM_SUBMIT') === self::EXPORT_TO_CSV_FROM_ID) {
            echo "exportToCSV: 1 <br>";
        }
        else {
            /** @var \Contao\SelectMenu $selectMenu */
            $selectMenu = $this->getDocumentTypeSelectMenu();
            $messages = Message::generate();
            Message::reset();

            // TODO: use better solution as this Contao default.
            // Return form.
            return '
<div id="tl_buttons">
 <a href="' . ampersand($this->redirectUrl) . '" class="header_back" title="' . StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['backBT']) . '">' . $GLOBALS['TL_LANG']['MSC']['backBT'] . '</a>
</div>

<h2 class="sub_headline">' . $GLOBALS['TL_LANG']['tl_iso_product_collection']['print_all_documents'][0] . '</h2>' . $messages . '

<form action="' . ampersand($this->currentRequestUrl, true) . '" id="' . self::PRINT_ALL_DOCUMENTS_FROM_ID . '" class="tl_form" method="post">
    <div class="tl_formbody_edit">
        <input type="hidden" name="FORM_SUBMIT" value="' . self::PRINT_ALL_DOCUMENTS_FROM_ID . '">
        <input type="hidden" name="REQUEST_TOKEN" value="' . REQUEST_TOKEN . '">
        
        <div class="tl_tbox block">
          <div class="clr widget">
            ' . $selectMenu->parse() . '
            <p class="tl_help">' . $selectMenu->description . '</p>
          </div>
        </div>
    </div>
    <div class="tl_formbody_submit">
        <div class="tl_submit_container">
            <input type="submit" name="print" id="print" class="tl_submit" alt="" accesskey="s" value="' . StringUtil::specialchars($GLOBALS['TL_LANG']['tl_iso_product_collection']['print']) . '">
        </div>
    </div>
</form>';
        }

    }


     protected function getDocumentTypeSelectMenu(): SelectMenu {
        $selectData = [
            'name' => 'document',
            'label' => &$GLOBALS['TL_LANG']['tl_iso_product_collection']['document_choice'],
            'inputType' => 'select',
            'foreignKey' => 'tl_iso_document.name',
            'eval' => ['mandatory' => TRUE]
        ];

        return new SelectMenu(SelectMenu::getAttributesFromDca($selectData, $selectData['name']));
    }

}
