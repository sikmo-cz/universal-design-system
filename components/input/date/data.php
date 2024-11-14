<?php
$demo_data =  array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-date', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes
  'size'          => '', //(string default:'') small / big / ''

  //Specific
	'label'         => 'My label', //(string default:'')
  'name'          => 'date', //(string default:'') input name attribute
  'value'         => '', //(string default:'') input value attribute
  'input_attributes' => array("required" => "required"), //(array default:array()) Array with extra input attributes
	'icon'         	=> '3d-arc-center-pt', //(string default:'') icon name
	'helper_text'   => 'Some informative text.', //(string default:'') Information helper text under input (Inherit from component util/helper)
	'helper_type'   => '', //(string default:'') info / warning / danger / success / '' (Inherit from component util/helper)
	'date_range'    => true, //(boolean default:false) Allow date range picker
  'date_min'      => "2025-11-08", //(string default:'') format: Y-m-d Limit minimum date
  'date_max'      => "2025-12-31", //(string default:'') format: Y-m-d Limit maximum date
  'date_start'    => "2024-03-01", //(string default:'') format: Y-m-d Selected / initial start date
  'date_end'      => "2025-11-08", //(string default:'') format: Y-m-d Selected / initial end date
);