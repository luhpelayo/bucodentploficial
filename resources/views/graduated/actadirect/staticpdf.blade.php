<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf actas direct</title>
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
    <h2>ACTAS DIRECTAS REGISTRADAS</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Codigo</th>
            <th>Estudiante</th>
            <th>Modalidad</th>
            <th>Tribunal</th>
            <th>Nota</th>
            <th>Hora y Fecha</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($actas as $acta)
          <tr>
            <td>{{ $acta->acta_code }}</td>
            <td>{{ $acta->student->student_lastname }} {{ $acta->student->student_name }} </td>
            <td>{{ $acta->modality->modality_name }}</td>
            <td>{{ $acta->acta_court }}</td>
            <td>{{ $acta->acta_note }}</td>
            <td>{{ $acta->acta_hour }} {{ $acta->acta_date }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>