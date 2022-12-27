<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>pdf academics tracking</title>
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
  <h2>SEGUIMIENTOS ACADEMICOS REGISTRADOS EN SISTEMA</h2>
  <table style="width: 100%">
    <thead>
      <tr>
        <th>Titulado</th>
        <th>Nombre Especialidad</th>
        <th>Tipo de Especialidad</th>
        <th>Estado</th>
        <th>Institución</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($academics as $academic)
      <tr>
        <td>{{ $academic->student->student_lastname }} {{ $academic->student->student_name }}</td>
        <td>{{ $academic->academic_name }}</td>
        <td>{{ $academic->academic_type }}</td>
        <td>{{ $academic->academic_status }}</td>
        <td>{{ $academic->academic_institute }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <p>Cantidad de Registros:{{ $cantidad }}</p>
  <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
  <p>{{ $fecha }}</p>
</body>

</html>