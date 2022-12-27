<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>pdf social activities</title>
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
  <h2>ACTIVIDADES SOCIALES REGISTRADAS EN SISTEMA</h2>
  <table style="width: 100%">
    <thead>
      <tr>
        <th>Estudiante</th>
        <th>Nombre de Actividad</th>
        <th>Nivel</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cultures as $culture)
      <tr>
        <td>{{ $culture->student->student_lastname }} {{ $culture->student->student_name }}</td>
        <td>{{ $culture->culture_name }}</td>
        <td>{{ $culture->culture_level }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <p>Cantidad de Registros:{{ $cantidad }}</p>
  <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
  <p>{{ $fecha }}</p>
</body>

</html>