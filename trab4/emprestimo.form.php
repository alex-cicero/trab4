  <form method="post"  action="salva.php">

  <div class="frame alert">

    <div class="row">
      <div class="col-sm-12"; style="text-align: center";><h1>Dados do usuário<br></h1></div>
    </div>

    <div class="row">
        <div class="form-group col-sm-6">
          <label class="control-label" for="nome">Nome*</label class="control-label">
          <input type="text" class="form-control" id="nome" name="nome" >
        </div>
        <div class="form-group col-sm-2">
          <label class="control-label" for="dataNascimento">Data de Nascimento*</label>
          <input type="text" class="form-control data" id="dataNascimento" name="dataNascimento" >
        </div>
        <div class="form-group col-sm-4">
          <label class="control-label" for="matricula">Matrícula*</label>
          <input type="text" class="form-control" id="matricula" name="matricula">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-4">
          <label class="control-label" for="email">E-mail*</label>
          <input type="text" class="form-control" id="email" name="email" >
        </div>
        <div class="form-group col-sm-4">
          <label class="control-label" for="telefoneFixo">Telefone*</label>
          <input type="text" class="form-control telefoneFixo" id="telefone" name="telefone" >
        </div>
        <div class="form-group col-sm-4">
          <label class="control-label" for="telefoneCelular">Celular</label>
          <input type="text" class="form-control telefoneCelular" id="celular" name="celular" >
        </div>
    </div>
    <div class="row">
      <div class="col-sm-12"; style="text-align: center;"><h1><br><br>Dados do livro<br></h1></div>
    </div>
    <div class="row">
        <div class="form-group col-sm-5">
          <label class="control-label" for="titulo">Título</label class="control-label">
          <input type="text" class="form-control" id="titulo" name="titulo" >
        </div>
        <div class="form-group col-sm-4">
          <label class="control-label" for="autor">Autor</label class="control-label">
          <input type="text" class="form-control" id="autor" name="autor">
        </div>
        <div class="form-group col-sm-3">
          <label class="control-label" for="isbn">ISBN*</label class="control-label">
          <input type="text" class="form-control isbn" id="isbn" name="isbn" >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-3">
          <label class="control-label" for="genero">Gênero*</label class="control-label">
          <select class="form-control" id="genero" name="genero"><?php carregaOptionsGeneros();?></select>
        </div>
        <div class="form-group col-sm-3">
          <label class="control-label" for="subg"> </label class="control-label">
          <select class="form-control" id="subg" name="subg"></select>
        </div>
        <div class="form-group col-sm-3">
          <label class="control-label" for="outro"> </label>
          <input type='text' class="form-control" id="outro" name="outro"/>
        </div>
        <div class="form-group col-sm-3" style="text-align: center;">
          <label class="control-label" for="salva"> </label class="control-label">
          <input type="submit" class="btn btn-primary" value="Salva">
        </div>
    </div>
  </div>
</form>

<script>
  $('#subg').css('display','none');
  //$('#subg').attr('disabled','disabled');
  $('#outro').css('display','none');
  $('#genero').on('change',function()
  {
      $('#subg').empty();
      var tipoSelecionado = $('#genero').val();
      if (!tipoSelecionado) {
        $('#outro').empty();
        $('#subg').empty();
        $('#outro').css('display','none');
        $('#subg').css('display','none');
      }
      else if (tipoSelecionado == 'Outro') {
          $('#subg').empty();
          $('#outro').css('display','block');
          $('#subg').css('display','none');
      }
      else {
        $.post('dados2.php', { genero:tipoSelecionado }, function(dados){
            var valores = JSON.parse(dados);
            $('#outro').css('display','none');
            if(valores.length > 0)
            {
              $('#subg').css('display', 'block');
              $('#outro').css('display','none');
                $('#subg').append('<option></option>');
                for(var i=0; i<valores.length; i++)
                {
                    $('#subg').append('<option>'+valores[i]+'</option>');
                }
            }
            else {
                $('#subg').css('display','none');
            }
            console.log(valores);
        });
      }
      console.log('Tipo Mudou', tipoSelecionado);
  });

</script>
