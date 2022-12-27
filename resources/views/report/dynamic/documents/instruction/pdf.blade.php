<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>pdf instructions report</title>
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
  <h2>REPORTE DINAMICO DE INSTRUCTIVOS</h2>
  <h5>Informacion filtrada por : @if(!empty($instruction_code)) Código de Instructivo = {{ $instruction_code }}, @endif @if(!empty($area_id)) Área ID = {{ $area_id }}, @endif @if(!empty($date_min) && !empty($date_max)) Rango de Fechas = {{ $date_min }} a {{$date_max}}, @endif @if(!empty($instruction_name)) Nombre Instructivo = {{ $instruction_name }}, @endif</h5>
    <table style="width: 100%">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Fecha</th>
          <th>Área</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consults as $consult)
        <tr>
          <td>{{ $consult->instruction_code }}</td>
          <td>{{ $consult->instruction_name }}</td>
          <td>{{ $consult->instruction_date }}</td>
          <td>{{ $consult->area->area_name }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>

</html>