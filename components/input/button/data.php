<?php
$demo_data = array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-button', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes
  'size'          => '', //(string default:'') small / big / ''

  //Specific
  'type'          => 'button:submit', //(string default:'button:submit') button:submit / button / a / div / span
  'href'          => '#url', //(string default:'#') Works only for 'type': a
  'variant'       => 'primary', //(string default:'primary') primary / secondary / tertiary / text / icon
  'icon_before'   => '', //(string default:'') Icon name
  'icon_after'    => '3d-arc-center-pt', //(string default:'') Icon name
  'text'          => 'Button', //(string default:'Submit')
);