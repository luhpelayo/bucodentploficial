<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf company</title>
</head>
<style>
    table,th,td {
        border: 1px solid black;
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
    <h2>EMPRESAS REGISTRADAS EN EL SISTEMA</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Nombre de la Empresa</th>
            <th>Contacto de la Empresa</th>
            <th>Celular</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($companies as $company)
          <tr>
            <td>{{ $company->company_name }}</td>
            <td>{{ $company->company_contact }}</td>
            <td>{{ $company->company_number }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>