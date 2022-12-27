<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf investigations</title>
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
    <h2>INVESTIGACIONES REGISTRADAS</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Código</th>
            <th>Responsable</th>
            <th>Nombre</th>
            <th>Fecha Inicio</th>
            <th>Fecha Final</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($investigations as $investigation)
          <tr>
            <td>{{ $investigation->investigation_code }}</td>
            <td>{{ $investigation->investigation_subject }}</td>
            <td>{{ $investigation->investigation_name }}</td>
            <td>{{ $investigation->investigation_stardate }}</td>
            <td>{{ $investigation->investigation_endate }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>