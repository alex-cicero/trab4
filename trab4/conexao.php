<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "biblioteca";

$c = mysqli_connect($host,$usuario,$senha);

if(!$c){
  echo "erro na conexão";
  echo "<br>";
  echo mysqli_error($c);
  die();
}

if(!mysqli_select_db($c,$banco)){
  echo "erro no select_db";
  echo "<br>";
  echo mysqli_error($c);
  mysqli_close($c);
  die();
}
