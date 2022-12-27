<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf modality</title>
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
    <h2>MODALIDADES GRL REGISTRADAS EN EL SISTEMA</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Nombre</th>
            <th>Descripción</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($modalities as $modality)
          <tr>
            <td>{{ $modality->modality_name }}</td>
            <td>{{ $modality->modality_description }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>