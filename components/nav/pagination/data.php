<?php
$demo_data = array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-pagination', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes

  //Specific
  'url'           => '?page=%d', //(string default:'?page=%d') %d = variable for page number
  'pages'         => 100, //(int default:0) maximum pages
  'page_current'  => 7, //(int default:0) current active page
  'size'          => 'small', //(string default:'') small or '' empty
  'range'         => 2, //(int default:2) number of pages wrapped arround current page
  'show_arrows'   => true, //(boolean default:true)
);