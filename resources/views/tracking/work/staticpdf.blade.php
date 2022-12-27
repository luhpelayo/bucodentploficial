<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>pdf works tracking</title>
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
  <h2>SEGUIMIENTOS LABORALES REGISTRADOS EN SISTEMA</h2>
  <table style="width: 100%">
    <thead>
      <tr>
        <th>Titulado</th>
        <th>Nombre de Empresa</th>
        <th>Cargo Ejercido</th>
        <th>Estado</th>
        <th>Duración en Fecha</th>
        <th>Funciones realizadas en Empresa</th>
        <th>Referencia Empresa</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($works as $work)
      <tr>
        <td>{{ $work->student->student_lastname }} {{ $work->student->student_name }}</td>
        <td>{{ $work->work_company }}</td>
        <td>{{ $work->work_role }}</td>
        <td>{{ $work->work_status }}</td>
        <td>
          @if(!empty($work->work_endate))
          desde:{{ $work->work_stardate }} hasta:{{ $work->work_endate }}
          @else()
          desde:{{ $work->work_stardate }} hasta: Actualidad
          @endif
        </td>
        <td>{{ $work->work_activities }}</td>
        <td>{{ $work->work_references }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <p>Cantidad de Registros:{{ $cantidad }}</p>
  <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
  <p>{{ $fecha }}</p>
</body>

</html>