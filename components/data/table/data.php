<?php
$demo_data = array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-table', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes
  'size'          => '', //(string default:'') extrasmall / small / big / ''

  //Specific
  'first_row_is_table_head' => true, //(boolean default:false)
  'html_escape'             => true, //(boolean default:true) Set false if you want add custom HTML code into table cells
  'data'                    => array( //(array default:array()) Multidimensional array
    array("Created by", "Date", "Assigned", "State", "Actions"),
    array("Data1", "Data", "Data", "Data", "<Data>"),
    array("Data2", "Data", "Data", "data", "<Data>"),
    array("Data3", "Data", "Data", "Data", "<Data>"),
    array("Data4", "Data", "Data", "Data", "<Data>"),
    array("Data5", "Data", "Data", "Data", "<Data>"),
  ),
);