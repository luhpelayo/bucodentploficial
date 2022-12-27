<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf agreement national</title>
</head>
<style>
  table,th,td {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;
  }

  h2 {
      text-align: center;
      color: red;
  }
  p, label{
      text-align: center;
      color: green;
  }
</style>
<body>
    <h2>CONVENIOS NACIONALES REGISTRADOS EN SISTEMA</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Fecha de Convenio</th>
            <th>Nombre de Organización</th>
            <th>Firma UAGRM</th>
            <th>Firma Empresa</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($nationals as $national)
          <tr>
            <td>{{ $national->national_date }}</td>
            <td>{{ $national->national_organization }}</td>
            <td>{{ $national->national_uagrm }}</td>
            <td>{{ $national->national_company }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>