<?php
$demo_data = array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-helper', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes
  'size'          => '', //(string default:'') small / big / ''

  //Specific
  'text'          => 'Lorem ipsum dolor.', //(string default:'')
  'type'          => 'info', //(string default:'') info / warning / danger / success / ''
  'inline'        => false, //(bool default:false) inline style without solid background
  'allow_html'    => false, //(bool default:false) allow html in text
);