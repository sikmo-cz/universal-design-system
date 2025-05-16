<?php
$demo_data = array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-accordion', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes
  'size'          => '', //(string default:'') small / big / ''

  //Specific
  'items'        => array( //(array default:array()) Array with accordion items
    array(
      'caption'      => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit',
      'text'         => 'Soluta debitis deserunt obcaecati distinctio illo qui doloremque corrupti odit hic ipsam quos in assumenda, a officia asperiores recusandae, facilis quis nam?',
    ),
    array(
      'caption'      => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit',
      'text'         => 'Soluta debitis deserunt obcaecati distinctio illo qui doloremque corrupti odit hic ipsam quos in assumenda, a officia asperiores recusandae, facilis quis nam?',
      'open'         => true,
    ),
    array(
      'caption'      => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit',
      'text'         => 'Soluta debitis deserunt obcaecati distinctio illo qui doloremque corrupti odit hic ipsam quos in assumenda, a officia asperiores recusandae, facilis quis nam?',
    ),
  ),
);