<?php

  include "lib/fw.php";

  function pageTitle()
  {
    echo "Gráfico 1";
  }

  function mainContent()
  {
    include 'arc1.php';
  }
    include "lib/main-template.php";

function teste(){
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

  $sql = "SELECT DISTINCT genero FROM generos";
  // consulta 1 = saber quais são os generos

  $resp = mysqli_query($c, $sql);
  if(!$resp){
    echo "erro na consulta $sql";
    echo "<br>";
    echo mysqli_error($c);
    mysqli_close($c);
    die();
  }

  $resultado = mysqli_fetch_assoc($resp);

  $nomeGeneros = array();

  $k = 0;

  if($resultado !== false) {
    while($resultado) {
      $nomeGeneros[$k] = $resultado['genero'];
  //     echo $nomeGeneros[$k];
  //     echo "<br>";
      $k++;
      $resultado = mysqli_fetch_assoc($resp);
    }
    //echo "<br>";
  }

  $sql = "SELECT DISTINCT genero, count(genero) FROM livros GROUP BY genero";
  // consulta 2 = saber quantos generos têm livros e quantos livros são;

   $resp = mysqli_query($c, $sql);
   if(!$resp){
    echo "erro na consulta $sql";
     echo "<br>";
     echo mysqli_error($c);
    mysqli_close($c);
     die();
   }

   $resultante = mysqli_fetch_assoc($resp);

  $conn = getConnection();
  $resultado = $conn->query($sql);

  $array = array();
  $vet = array();
  $a2 = array();
  $i = 0;
  $coluna = 'genero';

    while($resultante) {
      $a2[$i] = $resultante['genero']; // NOMES DOS GENEROS QUE TEM LIVROS
      $vet[$i] = $resultante['count(genero)']; //QUANTIDADE DE LIVROS POR GENERO
      // echo $a2[$i];
      // echo $vet[$i];
    //   echo "<br>";
      $i++;
      $resultante = mysqli_fetch_assoc($resp);
    }

    $i = 0;
    foreach($resultado as $row) {
      if(isset($array[$row[$coluna]])){
          $array[$row[$coluna]]++;
      } else {
          $array[$row[$coluna]] = $vet[$i];
      }
      $i++;
    }

  $string = '[';

    foreach ($array as $key => $value) {
        $string .= "{key : \"$key\" , value : $value}," ;
    }
    $string .= ']';

    //echo $string;
  return $string;
}


// function getValores($nomeGeneros, $a2, $vet){

    // $quant2 = count($a2);
    // $quant1 = count($nomeGeneros);
    // $string = '[';
    // $index1 = 0;
    // $index2 = 0;
    // $vet2 = array();
    // $vet2 = $a2; //cópia de $a2, nome dos generos
    // $vet3 = array();
    // $vet3 = $vet; // copia de $vet, quant de livros por genero
    // $teste = false;
    //
    // while($index1 <= $quant1 - 1){
    //   if(isset($nomeGeneros[$index1])){
    //     while ($index2 <= $index1) {
    //       if (isset($vet[$index2])) {
    //         if($nomeGeneros[$index1] == $vet2[$index2]){
    //           $string .= "{'key' : {$vet2[$index2]} , 'value' : {$vet3[$index2]} }" ;
    //           $vet2[$index2] = NULL;
    //           $vet3[$index2] = NULL;
    //           $teste = true;
    //           break;
    //         }
    //       $index2++;
    //       }
    //       if ($teste == false) {
    //         $string .= "{'key' : $nomeGeneros[$index1] , 'value' : 0 }" ;
    //       }
    //       if ($index1 < $quant1) {
    //         $string .= ', ';
    //       }
    //     }
    //   }
    //   $index2 = 0;
    //   $index1++;
    //   $teste = false;
    // }

    // $string .= ']';
  //  return $string;
// }
