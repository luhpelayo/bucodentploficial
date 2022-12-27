<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>pdf investigation report</title>
</head>
<style>
  table,
  th,
  td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;
  }

  h2 {
    text-align: center;
    color: red;
  }

  p,
  label {
    text-align: center;
    color: green;
  }
</style>

<body>
  <h2>REPORTE DINAMICO DE INVESTIGACIONES</h2>
  <h5>Informacion filtrada por : @if(!empty($investigation_code)) Codigo Invest. = {{ $investigation_code }}, @endif @if(!empty($investigation_subject)) Responsable = {{ $investigation_subject }}, @endif @if(!empty($date_min) && !empty($date_max)) Rango de Fechas = {{ $date_min }} a {{$date_max}}, @endif @if(!empty($investigation_name)) Nombre Invest. = {{ $investigation_name }}, @endif</h5>
    <table style="width: 100%">
      <thead>
        <tr>
          <th>Código</th>
          <th>Responsable</th>
          <th>Nombre</th>
          <th>Fecha Inicio</th>
          <th>Fecha Final</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consults as $consult)
        <tr>
          <td>{{ $consult->investigation_code }}</td>
          <td>{{ $consult->investigation_subject }}</td>
          <td>{{ $consult->investigation_name }}</td>
          <td>{{ $consult->investigation_stardate }}</td>
          <td>{{ $consult->investigation_endate }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>

</html>