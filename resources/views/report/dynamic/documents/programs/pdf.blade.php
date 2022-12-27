<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>pdf programs report</title>
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
  <h2>REPORTE DINAMICO DE PROGRAMAS ANALITICOS</h2>
  <h5>Informacion filtrada por : @if(!empty($program_code)) Código de Programa = {{ $program_code }}, @endif @if(!empty($area_id)) Área ID = {{ $area_id }}, @endif @if(!empty($program_name)) Nombre de Programa = {{ $program_name }}, @endif @if(!empty($program_acronym)) Sigla/Código = {{ $program_acronym }}, @endif @if(!empty($program_credit)) Creditos = {{ $program_credit }}, @endif @if(!empty($program_level)) Nivel = {{ $program_level }}, @endif   @if(!empty($date_min) && !empty($date_max)) Rango de Fechas = {{ $date_min }} a {{$date_max}}, @endif @if(!empty($program_designed)) Nombre Elaborador = {{ $program_designed }}, @endif</h5>
    <table style="width: 100%">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Asignatura</th>
          <th>Sigla-Código</th>
          <th>Nivel</th>
          <th>Créditos</th>
          <th>Elaborado por</th>
          <th>En Fecha</th>
          <th>Área</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consults as $consult)
        <tr>
          <td>{{ $consult->program_code }}</td>
          <td>{{ $consult->program_name }}</td>
          <td>{{ $consult->program_acronym }}</td>
          <td>{{ $consult->program_level }}</td>
          <td>{{ $consult->program_credit }}</td>
          <td>{{ $consult->program_designed }}</td>
          <td>{{ $consult->program_date }}</td>
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