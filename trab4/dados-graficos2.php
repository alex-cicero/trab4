<?php
  include "lib/fw.php";
  $dados = [];
  if(isset($_REQUEST["academico"]))
    echo json_encode(academico($dados));

function academico($dados){
  $y = 0;
  $stm = getConnection()->prepare("SELECT isbn, subgenero, count(subgenero) as quantLivros FROM livros WHERE subgenero is not NULL and genero = 'Acadêmico' GROUP BY (subgenero)");
  if($stm->execute())
  {
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    while($row)
    {
      $dados[$y]["subgenero"] = $row["subgenero"];
      $dados[$y]["quantLivros"] = intval($row["quantLivros"]);
      $y++;
      $row = $stm->fetch(PDO::FETCH_ASSOC);
    }
  }
  return $dados;
}

?>
