<?php
$demo_data =  array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-textarea', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes
  'size'          => '', //(string default:'') small / big / ''

  //Specific
	'label'         => 'My textarea', //(string default:'')
  'label_allow_html' => false, //(bool default:false) Allow HTML in label
  'name'          => 'textarea', //(string default:'') input name attribute
  'value'         => '', //(string default:'') textarea default value
  'input_attributes' => array("required" => "required"), //(array default:array()) Array with extra textarea attributes
	'helper_text'   => 'Some informative text under textarea.', //(string default:'') Information helper text under input (Inherit from component util/helper)
	'helper_type'   => '', //(string default:'') info / warning / danger / success / '' (Inherit from component util/helper)
);