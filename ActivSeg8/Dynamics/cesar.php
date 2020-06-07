<?php
$TR=$_POST['TR'];
  $ABC=['W','X','Y','Z','A','B','C','D','E','F','G','H','I','J','K',
  'L','M','N','O','P','Q','R','S','T','U','V'];
  $ABCesar=["A", "B", "C", "D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
  /*$ABCesar=["E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","A","B","C","D"];*/
  $correc = str_replace($ABCesar, $ABC, $TR);
  echo "<fieldset>";
  echo "  <legend><h3>Texto cifrado</h3></legend>";
  echo    $correc;  // se imprime el texto cambiado
  echo "</fieldset>";
?>
