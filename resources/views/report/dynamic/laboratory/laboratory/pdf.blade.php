<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>pdf laboratories report</title>
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
  <h2>REPORTE DINAMICO DE LABORATORIOS</h2>
  <h5>Informacion filtrada por : @if(!empty($labphoto_name)) Nombre Laboratorio = {{ $labphoto_name }}, @endif @if(!empty($matter_id)) Materia ID = {{ $matter_id }}, @endif @if(!empty($date_min) && !empty($date_max)) Rango de Fechas = {{ $date_min }} a {{$date_max}}, @endif @if(!empty($labphoto_subject)) Responsable = {{ $labphoto_subject }}, @endif</h5>
    <table style="width: 100%">
      <thead>
        <tr>
          <th>Fecha Elaboración</th>
          <th>Nombre de Laboratorio</th>
          <th>Responsable</th>
          <th>Materia--Grupo</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consults as $consult)
        <tr>
          <td>{{ $consult->labphoto_date}}</td>
          <td>{{ $consult->labphoto_name }}</td>
          <td>{{ $consult->labphoto_subject }}</td>
          <td>{{ $consult->matter->matter_initial }} {{ $consult->matter->matter_name }}--{{$consult->matter->matter_group }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>

</html>