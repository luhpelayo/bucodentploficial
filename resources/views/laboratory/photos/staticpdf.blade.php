<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf laboratorios</title>
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
    <h2>LABORATORIOS REGISTRADOS EN SISTEMA</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Fecha Elaboración</th>
            <th>Nombre</th>
            <th>Responsable</th>
            <th>Materia--Grupo</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($laboratories as $laboratory)
          <tr>
            <td>{{ $laboratory->labphoto_date }}</td>
            <td>{{ $laboratory->labphoto_name }}</td>
            <td>{{ $laboratory->labphoto_subject }}</td>
            <td>{{ $laboratory->matter->matter_initial }} {{ $laboratory->matter->matter_name }}--{{ $laboratory->matter->matter_group }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>