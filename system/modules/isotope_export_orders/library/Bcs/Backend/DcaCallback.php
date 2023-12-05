<?php

namespace Bcs\Backend;

use Contao\Backend;
use Contao\DC_Table;
use Contao\Environment;
use Contao\Input;

class DcaCallback extends Backend {

    /**
     * Called by onload_callback.
     *
     * @param \Contao\DC_Table $dataContainer
     *   The Contao data container (DC).
     */
    public function onLoad(DC_Table $dataContainer): void {
        // Is available after button submission.
        if (Input::post('FORM_SUBMIT') === 'tl_select') {
            echo "BING BONG";
            die();
        }

    }

}
