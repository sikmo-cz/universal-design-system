<?php
$demo_data = array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-progress', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes

  //Specific
  'items'        => array( //(array default:array()) Array with progress items
    array(
      'step'         => "1",
      'href'         => '#step1',
      'text'         => 'Cart',
      'done'         => true,
    ),
    array(
      'step'         => "2",
      'href'         => '#step2',
      'text'         => 'Shipping',
      'done'         => true,
    ),
    array(
      'step'         => "3",
      'href'         => '#step3',
      'text'         => 'Confirmation',
    ),
  ),
);