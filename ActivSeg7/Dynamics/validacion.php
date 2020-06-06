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
?>
