<?php
  $mensaje=$_POST['TR'];
  $mej=substr("$mensaje", 0, 4);  //se separarán elementos del mensaje
  $mejo=substr("$mensaje", -6);
  $mejor=substr("$mensaje", 4, -6);
  /*echo $mensaje;
  echo "<br>";*/
  $cif=$mejo.$mejor.$mej;   //se reordenarán esos elementos
  //echo $cif;
  $mejc=substr("$cif", 0, 6);  // se repetirá el proceso
  $mejoc=substr("$cif", -3);
  $mejorc=substr("$cif", 6, -3);
  $ciff=$mejoc.$mejc.$mejorc;
  $rand=rand(100,200);  //unos números aleatorios
  echo $rand." ";
  for ( $pos=0; $pos < strlen($ciff); $pos ++ )  //código ascii
  {
   $byte = substr($ciff, $pos);
   echo ord($byte).PHP_EOL;
  }
  $tum=rand(100,200);
  echo $tum;
?>
