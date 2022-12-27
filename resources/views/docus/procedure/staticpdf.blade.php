<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf procedures</title>
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
    <h2>PROCEDIMIENTOS REGISTRADOS EN SISTEMA</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Área</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($procedures as $procedure)
          <tr>
            <td>{{ $procedure->procedure_code }}</td>
            <td>{{ $procedure->procedure_name }}</td>
            <td>{{ $procedure->procedure_date }}</td>
            <td>{{ $procedure->area->area_name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>