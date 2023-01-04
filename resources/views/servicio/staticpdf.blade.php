<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf servicio</title>
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
    <h2>SERVICIOS REGISTRADOS EN EL SISTEMA</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>NOMBRE</th>
            <th>DESCRIPCION</th>
            <th>PRECIO</th>
        </thead>
        <tbody>
          @foreach ($servicios as $servicio)
          <tr>
            <td>{{ $servicio->nombre }}</td>
            <td>{{ $servicio->descripcion }}</td>
            <td>{{ $servicio->precio }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>Bucodent</p>
    <p>{{ $fecha }}</p>
</body>
</html>