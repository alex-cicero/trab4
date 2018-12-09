  <meta charset="utf-8">
    <link href="nvd3/nv.d3.css" rel="stylesheet" type="text/css">
    <script src="nvd3/d3.min.js" charset="utf-8"></script>
    <script src="nvd3/nv.d3.js"></script>
    <script src="nvd3/pieChart.js" type="application/javascript"></script>


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


<body style="text-align: center; background-color: #fffa89">

<h1 style="text-align: center;"><br>Comparação de quantidade de livros por gênero</h1>

<div style="text-align: center; background-color: white; font: 15px sans-serif;">
  <p>Por Alex Cícero, 3BINFO 2018</p>
</div>

<div class="testBlock">
  <svg id="grafico"></svg>

</div>

<script>

    var width = 350;
    var height = 350;

    /* var dadosGeneros = <?php /*echo getValores($nomeGeneros, $a2, $vet);*/ ?>;*/
  /*  var dadosGeneros = <?php /*echo $string; */?>;*/
    var dadosGeneros = <?php echo teste() ?>;

    nv.addGraph(function() {
        var chart = nv.models.pie()
            .x(function(d) { return d.key; })
            .y(function(d) { return d.value; })
            .width(width)
            .height(height)
            .showLabels(true)
            .donut(true)
            .labelType("key");

        //    chart.pie.pieLabelsOutside(false).labelType("percent");

      d3.select("#grafico")
          .datum([dadosGeneros])
          .transition().duration(1200)
          .attr('width', width)
          .attr('height', height)
          .call(chart);
        return chart;
    });


    //======================================================================================
    //FUNCTION ADDED BY ME, ALEX CICERO, THATS RIGHT
    //===========================================================================================



</script>
