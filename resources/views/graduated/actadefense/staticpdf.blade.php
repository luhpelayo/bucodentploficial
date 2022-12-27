<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf actas</title>
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
    <h2>ACTAS DE DEFENSA REGISTRADAS</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Codigo</th>
            <th>Estudiante</th>
            <th>Título TFG</th>
            <th>Modalidad</th>
            <th>Asesor de Tesis</th>
            <th>Tribunal de Defensa</th>
            <th>Nota</th>
            <th>Fecha, Hora de Defensa</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($actas as $acta)
          <tr>
            <td>{{ $acta->acta_code }}</td>
            <td>{{ $acta->tomo->student->student_lastname }} {{ $acta->tomo->student->student_name }} </td>
            <td>{{ $acta->tomo->tomo_title }}</td>
            <td>{{ $acta->tomo->modality->modality_name }}</td>
            <td>{{ $acta->tomo->tomo_consultant }}</td>
            <td>{{ $acta->acta_court }}</td>
            <td>{{ $acta->acta_note }}</td>
            <td>{{ $acta->acta_date }}, {{ $acta->acta_hour }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>