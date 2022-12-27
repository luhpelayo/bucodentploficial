<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf guias</title>
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
    <h2>GUIAS REGISTRADAS EN EL SISTEMA</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Nombre Práctica</th>
            <th>Materia--Grupo</th>
            <th>Docente Titular</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($guides as $guide)
          <tr>
            <td>{{ $guide->guide_name }}</td>
            <td>{{ $guide->matter->matter_initial }} {{ $guide->matter->matter_name }}--{{ $guide->matter->matter_group }}</td>
            <td>{{ $guide->matter->matter_teacher }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>