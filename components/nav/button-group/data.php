<?php
$demo_data = array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-button-group', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes
  'size'          => '', //(string default:'') small / big / ''

  //Specific
  'items'        => array( //(array default:array()) Array with breadcrumb items
    array(
      'href'         => '#page1',
      'text'         => 'Home',
    ),
    array(
      'href'         => '#page2',
      'text'         => 'E-shop',
      'active'       => true,
    ),
    array(
      'href'         => '#page3',
      'text'         => 'Contact',
    ),
  ),
);