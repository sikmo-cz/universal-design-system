<?php
$demo_data =  array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-toggle', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes
  'size'          => '', //(string default:'') small / big / ''

  //Specific
  'name'          => 'toggle', //(string default:'') input name attribute
  'checked'       => false, //(boolean default:false)
  'value'         => 'someval', //(string default:'') input value attribute
  'input_attributes' => array("required" => "required"), //(array default:array()) Array with extra input:checkbox attributes
  'helper'        => 'Some helper text', //(string default:'') Helper text
  'helper_allow_html' => true, //(boolean default:false) Allow HTML in helper text
);