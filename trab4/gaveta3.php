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

  $sql = "SELECT genero, subgenero, count(subgenero) FROM livros WHERE subgenero != 'NULL' and genero = 'Ficção' GROUP BY subgenero";
  // consulta 1 = saber quantos subgeneros têm livros e quantos livros são, dentro do genero FICCAO;

  $resp = mysqli_query($c, $sql);
  if(!$resp){
    echo "erro na consulta $sql";
    echo "<br>";
    echo mysqli_error($c);
    mysqli_close($c);
    die();
  }

  $resultado = mysqli_fetch_assoc($resp);

  $vet = array();
  $a2 = array();
  $i = 0;
  if($resultado !== false) {
    while($resultado) {
      $a2[$i] = $resultado['genero']; // NOMES DOS GENEROS QUE TEM LIVROS
      $vet[$i] = $resultado['count(genero)']; //QUANTIDADE DE LIVROS POR GENERO
      // echo $a2[$i];
      // echo $vet[$i];
      // echo "<br>";
      $i++;
      $resultado = mysqli_fetch_assoc($resp);
    }
  }

   function getValores($nomeGeneros, $a2, $vet)
  {
    $quant2 = count($a2);
    $quant1 = count($nomeGeneros);
    $string = '[';
    $index1 = 0;
    $index2 = 0;
    $vet2 = array();
    $vet2 = $a2; //cópia de $a2, nome dos generos
    $vet3 = array();
    $vet3 = $vet; // copia de $vet, quant de livros por genero
    $teste = false;

    while($index1 <= $quant1 - 1){
      while ($index2 <= $index1) {
        if($nomeGeneros[$index1] == $vet2[$index2]){
          $string .= "{'label' : {$vet2[$index2]} , 'value' : {$vet3[$index2]} }" ;
          $vet2[$index2] = NULL;
          $vet3[$index2] = NULL;
          $teste = true;
          break;
        }
      $index2++;
      }
      if ($teste == false) {
        $string .= "{'label' : {$nomeGeneros[$index1]} , 'value' : 0 }" ;
      }
      if ($index1 < $quant1 - 2) {
        $string .= ', ';
      }
      $index2 = 0;
      $index1++;
      $teste = false;
    }
    $string .= '];';
    return $string;
  }

?>
