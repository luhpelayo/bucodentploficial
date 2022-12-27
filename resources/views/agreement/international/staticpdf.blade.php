<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf agreement international</title>
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
    <h2>CONVENIOS INTERNACIONALES REGISTRADOS EN SISTEMA</h2>
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
          @foreach ($internationals as $international)
          <tr>
            <td>{{ $international->international_date }}</td>
            <td>{{ $international->international_organization }}</td>
            <td>{{ $international->international_uagrm }}</td>
            <td>{{ $international->international_company }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>