<?php

  //jeito 1 - variável pre definida
  $codigo_sku = 1234;
  $tipo_roupa = 'vestido';
  $marca = 'Farm';
  $qntd_disp = 13;

  function exibe_primeiro (){
    echo "O codigo SKU atual: ". $GLOBALS['codigo_sku'];
    echo "\nO codigo tipo de roupa: " . $GLOBALS['tipo_roupa'];
  }

  exibe_primeiro();



  //jeito 2 - array associativo 



?>
