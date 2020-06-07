<?php
  $nombre=$_POST['Nombre'];
  $apPaterno=$_POST['apPaterno'];
  $apMaterno=$_POST['apMaterno'];
  $nacimiento=$_POST['nacimiento'];
  $RFC=$_POST['RFC'];
  $pass=$_POST['pass'];
  //echo $nombre.$apPaterno.$apMaterno.$nacimiento.$RFC.$pass;
  $con=["á","é","í","ó","ú"];    //se preparan las partes para crear un RFC correcto
  $sin=["A","E","I","O","U"];
  $APA=str_replace($con, $sin, $apPaterno);
  $aPa=substr("$APA", 0, 2);
  $APAF = strtoupper($aPa);
  $aMa=substr("$apMaterno", 0, 1);
  $nom=substr("$nombre", 0, 1);
  $dia=substr("$nacimiento",-2);
  $mes=substr("$nacimiento",5,-3);
  $anio=substr("$nacimiento",2,-6);

  $APAp=substr("$RFC",0,2);    //todo esto para dividir el RFC ingresado
  $aMap=substr("$RFC",2,-10);
  $nomp=substr("$RFC",3,-9);
  $aniop=substr("$RFC",4,-7);
  $mesp=substr("$RFC",6,-5);
  $diap=substr("$RFC",8,-3);
  //echo "<br>";
  //echo $APAp.$aMap.$nomp.$aniop.$mesp.$diap;

  //echo "<br>";
  $RFCF=$APAF.$aMa.$nom.$anio.$mes.$dia;   //se crea un RFC correcto
  //echo $RFCF;
  $RFCC=substr("$RFC",0,-3);
  //echo "<br>";
  if($RFCF==$RFCC)
  {
    echo "RFC correcto.";
  }
  else
  {
    echo "RFC incorrecto.";
    echo "<br>";
    if($APAp!=$APAF)  //para saber cual dato se ingrsó mal
    {
      echo "Dato invalido: ".$APAp;
      echo "<br>";
    }
    if($aMap!=$aMa)
    {
      echo "Dato invalido: ".$aMap;
      echo "<br>";
    }
    if($nomp!=$nom)
    {
      echo "Dato invalido: ".$nomp;
      echo "<br>";
    }
    if($aniop!=$anio)
    {
      echo "Dato invalido: ".$aniop;
      echo "<br>";
    }
    if($mesp!=$mes)
    {
      echo "Dato invalido: ".$mesp;
      echo "<br>";
    }
    if($diap!=$dia)
    {
      echo "Dato invalido: ".$diap;
      echo "<br>";
    }
  }
  //preg_match('/[A-Za-z0-9@#$%?¡!&/]{10,25})/',"$pass");
  function validar_contraseña($contraseña,&$error_pass)
  {
   if(strlen($contraseña) < 10)
   {
      $error_pass = "La clave debe tener al menos 10 caracteres";
      return false;
   }
   if(strlen($contraseña) > 25)
   {
      $error_pass = "La clave no puede tener más de 25 caracteres";
      return false;
   }
   if (!preg_match('`[a-z]`',$contraseña))
   {
      $error_pass = "La clave debe tener al menos una letra minúscula";
      return false;
   }
   if (!preg_match('`[A-Z]`',$contraseña))
   {
      $error_pass = "La clave debe tener al menos una letra mayúscula";
      return false;
   }
   if (!preg_match('`[0-9]`',$contraseña))
   {
      $error_pass = "La clave debe tener al menos un caracter numérico";
      return false;
   }
   if (!preg_match('`[.,\/#!$@%\^&\*;:{}=\-+_~()”“"…]`',$contraseña))
   {
      $error_pass = "La clave debe tener al menos un signo";
      return false;
   }
   if (preg_match('`(123452|1234563|123456789test15|Password6|123456787|Zinch8|g_czechout9|Asdf10|Qwerty11|123456789012|123456713|Aa123456.14|iloveyou15|123416|abc12317|11111118|12312319|dubsmash20|test21|princess22|qwertyuiop23|sunshine24|BvtTest12325|11111)`',$contraseña))
   {
      $error_pass = "La clave seleccionada es muy usada";
      return false;
   }
   $error_pass = "";
   return true;
 }
 if (isset($pass))
 {
   $error_encontrado="";
   if (validar_contraseña($pass, $error_encontrado))
   {
      echo "<br>";
      echo "Su contraseña ".$pass." es segura";
   }
   else
   {
      echo "<br>";
      echo "Su contraseña ".$pass." es insegura: " . $error_encontrado;
   }
 }
?>
