<?php
 
/* Table tl_location */
$GLOBALS['TL_DCA']['tl_order_export'] = array
(
 
    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'enableVersioning'            => true,
        'sql' => array
        (
            'keys' => array
            (
                'id' 	=> 	'primary',
                'alias' =>  'index'
            )
        )
    ),
 
    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'                    => 1,
            'fields'                  => array('name'),
            'flag'                    => 1,
            'panelLayout'             => 'filter;search,limit'
        ),
        'label' => array
        (
            'fields'                  => array('name', 'filename'),
            'format'                  => '%s (%s)'
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations' => array
        (
            'edit' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_order_export']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.gif'
            ),
			
            'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_order_export']['copy'],
                'href'                => 'act=copy',
                'icon'                => 'copy.gif'
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_order_export']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
            'show' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_location']['show'],
                'href'                => 'act=show',
                'icon'                => 'show.gif'
            )
        )
    ),
 
    // Palettes
    'palettes' => array
    (
        'default'                     => '{location_legend},name,alias,contact_name;{address_legend},phone,url;{website_legend},territory_notes,zip;{publish_legend},published;'
    ),
 
    // Fields
    'fields' => array
    (
        'id' => array
        (
          'sql'                     => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp' => array
        (
          'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
    		'sorting' => array
    		(
          'sql'                     => "int(10) unsigned NOT NULL default '0'"
    		),
    		'name' => array
    		(
          'label'                   => &$GLOBALS['TL_LANG']['tl_location']['name'],
          'inputType'               => 'text',
          'default'		              => '',
          'search'                  => true,
          'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
          'sql'                     => "varchar(255) NOT NULL default ''"
    		),
    		'filename' => array
    		(
          'label'                   => &$GLOBALS['TL_LANG']['tl_location']['contact_name'],
          'inputType'               => 'text',
          'default'		              => '',
          'search'                  => true,
          'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
          'sql'                     => "varchar(255) NOT NULL default ''"
    		)
    )
);
