<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf analytic programs</title>
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
    <h2>PROGRAMAS ANALITICOS REGISTRADOS EN SISTEMA</h2>
    <table style="width: 100%">
        <thead >
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
          @foreach ($programs as $program)
          <tr>
            <td>{{ $program->program_code }}</td>
            <td>{{ $program->program_name }}</td>
            <td>{{ $program->program_acronym }}</td>
            <td>{{ $program->program_level }}</td>
            <td>{{ $program->program_credit }}</td>
            <td>{{ $program->program_designed }}</td>
            <td>{{ $program->program_date }}</td>
            <td>{{ $program->area->area_name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>