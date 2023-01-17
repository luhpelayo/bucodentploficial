<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf archivos</title>
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
    <h2>ARCHIVOS REGISTRADAS EN SISTEMA</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Descripcion</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($archivos as $archivo)
          <tr>
            <td>{{ $archivo->descripcion }}</td>

          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>BUCODENT</p>
    <p>{{ $fecha }}</p>
</body>
</html>