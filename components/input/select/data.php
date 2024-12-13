<?php
$demo_data =  array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-select', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes
  'size'          => '', //(string default:'') small / big / ''

  //Specific
  'label'         => 'Select', //(string default:'')
  'name'          => 'select', //(string default:'') input name attribute
  'input_attributes' => array("required" => "required"), //(array default:array()) Array with extra select attributes
  'helper_text'   => 'Some informative text under select.', //(string default:'') Information helper text under input (Inherit from component util/helper)
  'helper_type'   => '', //(string default:'') info / warning / danger / success / '' (Inherit from component util/helper)
  'search'        => true, //(boolean default:false) Allow search
  'multiple'      => true, //(boolean default:false) Allow multiple options select
  'options'       => array( //(array default:array()) Array of all options
  	array(
  		'value'             => '1',
  		'text'              => 'Option 1',
      'option_attributes' => array("data-extra" => "hello world"), //(array default:array()) Array with extra option attributes
      'selected'          => true,
  	),
  	array(
  		'value' => '2',
  		'text' => 'Option 2',
  	),
  	array(
  		'value' => '3',
  		'text' => 'Option 3',
  	)
  ),
);