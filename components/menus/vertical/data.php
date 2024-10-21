<?php
$demo_data = array(
	'items'        => array(
        array(
            'href'         => '#tab1',
            'text'         => 'item 1',
            'icon'       => 'ico',
            'active'       => true
        ),
        array(
            'href'         => '#item2',
            'text'         => 'item 2', 
            'subItems'     => array(
                array(
                    'href'         => '#subitem1',
                    'text'         => 'Sub item 1',
                ),
                array(
                    'href'         => '#subitem2',
                    'text'         => 'Sub item 2',
                    'active'       => true
                ),
                array(
                    'href'         => '#subitem3',
                    'text'         => 'Sub item 3',
                ),
            )
        ),
        array(
            'href'         => '#item3',
            'text'         => 'item 3',
        ),
    ),
    'class'        => 'js-nav',
    'id'           => 'nav-id',
    'extra-attr'   => 'data-special="custom-data"',
    'size'         => 'small',
    'caption'      => 'Dashboard'
);