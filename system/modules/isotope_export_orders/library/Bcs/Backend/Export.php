<?php

namespace Bcs\Backend;

class Export
{
    public function addAliasButton($arrButtons, DataContainer $dc)
    {
      if (!System::getContainer()->get('security.helper')->isGranted(ContaoCorePermissions::USER_CAN_EDIT_FIELD_OF_TABLE, 'tl_page::alias'))
      {
        return $arrButtons;
      }
    
      // Generate the aliases
      if (Input::post('alias') !== null && Input::post('FORM_SUBMIT') == 'tl_select')
      {
        $objSession = System::getContainer()->get('request_stack')->getSession();
        $session = $objSession->all();
        $ids = $session['CURRENT']['IDS'] ?? array();
    
        foreach ($ids as $id)
        {
          $objPage = PageModel::findWithDetails($id);
    
          if ($objPage === null)
          {
            continue;
          }
    
          $dc->id = $id;
          $dc->activeRecord = $objPage;
    
          $strAlias = '';
    
          // Generate new alias through save callbacks
          if (is_array($GLOBALS['TL_DCA'][$dc->table]['fields']['alias']['save_callback'] ?? null))
          {
            foreach ($GLOBALS['TL_DCA'][$dc->table]['fields']['alias']['save_callback'] as $callback)
            {
              if (is_array($callback))
              {
                $strAlias = System::importStatic($callback[0])->{$callback[1]}($strAlias, $dc);
              }
              elseif (is_callable($callback))
              {
                $strAlias = $callback($strAlias, $dc);
              }
            }
          }
    
          // The alias has not changed
          if ($strAlias == $objPage->alias)
          {
            continue;
          }
    
          // Initialize the version manager
          $objVersions = new Versions('tl_page', $id);
          $objVersions->initialize();
    
          // Store the new alias
          Database::getInstance()
            ->prepare("UPDATE tl_page SET alias=? WHERE id=?")
            ->execute($strAlias, $id);
    
          // Create a new version
          $objVersions->create();
        }
    
        $this->redirect($this->getReferer());
      }
    
      // Add the button
      $arrButtons['alias'] = '<button type="submit" name="alias" id="alias" class="tl_submit" accesskey="a">' . $GLOBALS['TL_LANG']['MSC']['aliasSelected'] . '</button> ';
    
      return $arrButtons;
    }
}
