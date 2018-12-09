    <meta charset="utf-8">
      <link href="nvd3/nv.d3.css" rel="stylesheet" type="text/css">
      <script src="nvd3/d3.min.js" charset="utf-8"></script>
      <script src="nvd3/nv.d3.js"></script>

      <style>
          text {
              font: 15px sans-serif;
          }
          .testBlock {
              display: block;
              float: center;
              height: 350px;
              width: 350px;
          }
          html, body,  #grafico, svg {
              margin: 0px;
              padding: 0px;
              height: 100%;
              width: 100%;
          }

      </style>

  <body style="text-align: center; background-color: #ffc3b7">

  <h1 style="text-align: center;"><br>Comparação de quantidade de livros por subgênero de Ficção</h1>

  <div style="text-align: center; background-color: white; font: 15px sans-serif;">
    <p>Por Alex Cícero, 3BINFO 2018</p>
  </div>

  <div class="testBlock">
    <svg id="grafico"></svg>
  </div>

  <script>

      var width = 350;
      var height = 350;
      $.post("dados-graficos3.php",{ficcao:"ficcao"}, function(d){
        var k = JSON.parse(d);
        console.log(k);
        nv.addGraph(function() {
            var chart = nv.models.pie()
                .x(function(d) { return d.subgenero; })
                .y(function(d) { return d.quantLivros; })
                .width(width)
                .height(height)
                .showLabels(true)
              //  .donut(true)
    //            .labelType("key");

          d3.select("#grafico")
              .datum([k])
              .transition().duration(1200)
              .attr('width', width)
              .attr('height', height)
              .call(chart);

          return chart;
        });

      });


</script>
</body>
</html>
