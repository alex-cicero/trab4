<html>
    <head>
        <script src="lib/jquery-3.2.1.min.js"></script>
    </head>
    <body>
        <script>
            $('#subg').attr('disabled','disabled');
            $('#genero').on('change',function()
            {
                var genero = $('#genero').val();
                if(genero == 'Acadêmico')
                {
                  $('#subg').removeAttr('disabled');
                  <?php
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
                  ?>
                }
                else
                {
                    valores = [];
                }
                $('#subg').empty();
                if(valores.length == 0)
                {
                    $('#subg').attr('disabled','disabled');
                }
                else
                {
                    $('#subg').removeAttr('disabled');
                    $('#subg').append('<option></option>');
                    for(var i=0; i<valores.length; i++)
                    {
                        $('#subg').append('<option>'+valores[i]+'</option>');
                    }
                }

                console.log('Genero mudou', genero);
            });

        </script>
    </body>
</html>
