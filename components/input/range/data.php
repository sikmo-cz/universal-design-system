<?php
$demo_data =  array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-input-text', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes
  'size'          => '', //(string default:'') small / big / ''

  //Specific
  'name'          => 'form-name', //(string default:'') Input Name attribute
  'value'         => 50, //(int|float default:0) Initial value
  'input_attributes' => array("required" => "required"), //(array default:array()) Array with extra input attributes
  'min'           => 0, //(int|float default:0) Minimum value
  'max'           => 100, //(int|float default:100) Maximum value
  'step'          => 10, //(int|float default:10) Step value
  'unit'          => '%', //(string default:'') Unit to show after value
);