<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf Ficha clinica</title>
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
    <h2>FICHAS CLINICAS REGISTRADAS EN SISTEMA</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Alergia</th>
            <th>Radiografia</th>
            <th>Descripcion</th>
            <th>Fecha Consulta</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($fichaclinicas as $fichaclinica)
          <tr>
            <td>{{ $fichaclinica->alergia }}</td>
            <td>{{ $fichaclinica->radiografia }}</td>
            <td>{{ $fichaclinica->archivo->descripcion }} </td>
            <td>{{ $fichaclinica->consulta->fechahora }} </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>BUCODENT</p>
    <p>{{ $fecha }}</p>
</body>
</html>