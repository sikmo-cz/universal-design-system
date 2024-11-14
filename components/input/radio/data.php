<?php
$demo_data =  array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-radio', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes
  'size'          => '', //(string default:'') small / big / ''

  //Specific
  'text'          => 'Label text', //(string default:'')
	'name'          => 'radio', //(string default:'') input name attribute
  'checked'       => false, //(boolean default:false)
  'value'         => 'someval', //(string default:'') input value attribute
  'input_attributes' => array("required" => "required"), //(array default:array()) Array with extra input attributes
);