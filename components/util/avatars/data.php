<?php
$demo_data = array(
  //Globals
  'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
  'id'            => 'id-avatars', //(string default:'')
  'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes
  'size'          => '', //(string default:'') small / big / ''

  //Specific
  'avatars'       => array( //(array default:array()) Array with avatars (passing through avatar component)
    array(
      'href'          => '#profile1',
      'text'          => 'Franta',
      'image'         => 'https://picsum.photos/id/10/100/100',
    ),
    array(
      'href'          => '#profile1',
      'text'          => 'Franta',
      'image'         => 'https://picsum.photos/id/40/100/100',
    ),
    array(
      'href'          => '#profile1',
      'text'          => 'Franta',
      'image'         => 'https://picsum.photos/id/80/100/100',
    ),
    array(
      'href'          => '#profile1',
      'text'          => 'Franta',
      'image'         => 'https://picsum.photos/id/120/100/100',
    ),
    array(
      'href'          => '#profile1',
      'text'          => 'Franta',
      'image'         => 'https://picsum.photos/id/160/100/100',
    ),
  ),
  'other_count'   => 35, //(string|int default:0)
  'other_tooltip' => 'Text těch<br>+30<br>tu<br>pak<br>se<br>to<br>ještě<br>domyslí', //(string default:'')
);