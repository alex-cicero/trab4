<?php
  include "lib/fw.php";

    $nome = $_REQUEST['nome'];
    $dataNascimento = $_REQUEST['dataNascimento'];
    $matricula = $_REQUEST['matricula'];
    $telefone = $_REQUEST['telefone'];
    $email = $_REQUEST['email'];
    $celular = $_REQUEST['celular'];

    $titulo = $_REQUEST['titulo'];
    $autor = $_REQUEST['autor'];
    $isbn = $_REQUEST['isbn'];
    $genero = $_REQUEST['genero'];

    $subg = $_REQUEST['subg'];
    $outro = $_REQUEST['outro'];

    if ($genero == 'Outro') {
      $genero = $outro;
    }

    $dados1 = array(
      'nome' => $nome,
      'matricula' => $matricula,
      'dataNasc' => $dataNascimento,
      'email' => $email,
      'telefone' => $telefone,
      'celular' => $celular
    );

    $dados2 = array(
      'titulo' => $titulo,
      'autor' => $autor,
      'isbn' => $isbn,
      'genero' => $genero,
      'subgenero' => $subg
    );

    $dados3 = array(
      'isbn' => $isbn,
      'matricula' => $matricula
    );

    $dados4 = array(
      'genero' => $genero
    );

    $resp = sqlInsert("cadastro", $dados1);
    if(!$resp){
      header('location: erro.php');
    } else {
      header('location: sucesso.php');
    }

      $resp = sqlInsert("livros", $dados2);
      if(!$resp){
        header('location: erro.php');
      } else {
        header('location: sucesso.php');
      }

        $resp = sqlInsert("emprestimo", $dados3);
          if(!$resp){
            header('location: erro.php');
          } else {
            header('location: sucesso.php');
          }

      $resp = sqlInsert("generos", $dados4);
        if(!$resp){
          header('location: erro.php');
        } else {
          header('location: sucesso.php');
        }
?>
