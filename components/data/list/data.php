<?php
$demo_data = array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-table', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes
  'size'          => '', //(string default:'') small / big / ''

  //Specific
  'icon_before'             => "check-circle", //(string default:"") Icon name
  'icon_color'              => "success", //(string default:"") info / success / warning / danger
  'html_escape'             => true, //(boolean default:true) Set false if you want add custom HTML code into rows
  'data'                    => array( //(array default:array()) Array with list values
    "The first row", "The second row", "The third row", "The fourth row", "The fifth row"
  ),
);