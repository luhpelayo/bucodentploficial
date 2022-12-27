<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf letters</title>
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
    <h2>MODELOS DE CARTAS REGISTRADOS EN SISTEMA</h2>
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
          @foreach ($letters as $letter)
          <tr>
            <td>{{ $letter->letter_code }}</td>
            <td>{{ $letter->letter_name }}</td>
            <td>{{ $letter->letter_date }}</td>
            <td>{{ $letter->area->area_name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>