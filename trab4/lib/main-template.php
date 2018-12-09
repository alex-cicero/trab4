<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php pageTitle();?></title>
    <?php headinclude();?>
  </head>
  <body>

    <nav class="navbar navbar-green navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="emprestimo.php">Empréstimo</a>
        </div>
        <div class="navbar-header">
          <a class="navbar-brand" href="testeConsulta1.php">Gráfico 1</a>
        </div>
        <div class="navbar-header">
          <a class="navbar-brand" href=testeConsulta2.php>Gráfico 2</a>";
        </div>
        <div class="navbar-header">
          <a class="navbar-brand" href=testeConsulta3.php>Gráfico 3</a>";
        </div>
      </div>
    </nav>

    <div style="background-color: #d0fbf9;">

    <div class="container">
      <?php mainContent();?>
      <div style="text-align: center; background-color: white; font: 15px sans-serif;">
        <p>Por Alex Cícero, 3BINFO 2018</p>
      </div>
    </div>
    <?php endinclude();?>
  </div>
  </body>
</html>
