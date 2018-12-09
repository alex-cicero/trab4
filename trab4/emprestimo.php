<?php

	include "lib/fw.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	if($requestMethod == 'POST')
	{
		$tabela = "entrada";
		$numeroInscricao = sqlInsert($tabela, $_POST);
		header("Location: index.php");
		die;
	}

	function carregaOptionsGeneros(){
    	$sql = "SELECT * FROM generos";
      $conn = getConnection();
      $resultado = $conn->query($sql);
      if($resultado !== false) {
				echo "<option> </option>";
        foreach($resultado as $row) {
          echo "<option value=\"$row[genero]\">$row[genero]</option>";
        }
				echo "<option value=\"Outro\">Outro</option>";
      }
	}

	function carregaOptionsOutros()
	{
		include selecao.php;
	}


	function pageTitle()
	{
		echo "Empréstimo de livros";
	}

	function mainContent()
	{
		include 'emprestimo.form.php';
		include 'chamaArchive.php';
	}

	include "lib/main-template.php";
