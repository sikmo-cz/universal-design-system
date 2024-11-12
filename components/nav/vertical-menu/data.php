<?php
$demo_data = array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-vertical-menu', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes
  'size'          => '', //(string default:'') small / big / ''

  //Specific
  'caption'      => 'Dashboard', //(string default:'') menu headline
  'items'        => array( //(array default:array()) Array with progress items
    array(
      'href'         => '#item1',
      'text'         => 'item 1',
      'icon'         => 'icon',
      'active'       => true
    ),
    array(
      'href'         => '#item2',
      'text'         => 'item 2', 
      'sub_items'    => array(
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
);