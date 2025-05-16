<?php
$demo_data =  array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-time', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes
  'size'          => '', //(string default:'') small / big / ''

  //Specific
  'label'         => 'Time', //(string default:'')
  'name'          => 'time', //(string default:'') input name attribute
  'input_attributes' => array("required" => "required"), //(array default:array()) Array with extra input attributes
  'helper_text'   => 'Some informative text under time input.', //(string default:'') Information helper text under input (Inherit from component util/helper)
  'helper_type'   => '', //(string default:'') info / warning / danger / success / '' (Inherit from component util/helper)
	'time_from'     => 60*10, //(int default:0) number of minutes from 00:00
  'time_to'       => 60*15, //(int default:1439) number of minutes from 00:00
  'time_gap'      => 15, //(int default:15) gap between generated times in minutes
);