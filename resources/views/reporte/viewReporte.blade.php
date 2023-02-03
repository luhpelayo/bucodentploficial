@extends('layouts.master')
@section('content')
<head>

  <script src="https://www.gstatic.com/charts/loader.js"></script>
  <script>

    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      // Define the chart to be drawn.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Element');
      data.addColumn('number', 'Percentage');
      data.addRows([
        ['Limpieza',  {{ $recibido_count }}],
        ['Extraccion',  {{ $verificado_count }}],
        ['Ortodoncia', {{ $derivado_count }}],
        ['Examen Bucodental', {{ $noterminado_count }}],
        ['Obturacion o llenado dental', {{ $terminado_count }}]
      ]);

      // Instantiate and draw the chart.
      var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
      chart.draw(data, null);
    }
  </script>
</head>
<body>
  <!-- Identify where the chart should be drawn. -->
  <div id="myPieChart"/>
  
</body>
@endsection