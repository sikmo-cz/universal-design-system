<?php
$demo_data = array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-tab', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes

  //Specific
  'items'        => array( //(array default:array()) Array with tab items
    array(
      'href'         => '#tab1',
      'text'         => 'Tab 1',
    ),
    array(
      'href'         => '#tab2',
      'text'         => 'Tab 2',
      'active'        => true,
    ),
    array(
      'href'         => '#tab3',
      'text'         => 'Tab 3',
    ),
  ),
);