<?php

    include 'lib/fw.php';

    $resposta = $_POST['genero'];

    $sql = "SELECT * FROM subgeneros where generos =  \"$resposta\";";
    $stm = getConnection()->prepare($sql);
    $recebeVal = [];
    if($stm->execute())
    {
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        $i = 0;
        while($row)
        {
            
            $recebeVal[$i] = $row['subg'];
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            $i++;
        }
        $stm->closeCursor();
    }

    echo json_encode($recebeVal);
