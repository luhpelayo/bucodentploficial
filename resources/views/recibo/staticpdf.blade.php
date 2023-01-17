<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf recibos</title>
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
    <h2>RECIBOS REGISTRADOS EN SISTEMA</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>AJC</th>
            <th>Credito</th>
            <th>Diente</th>
            <th>Fecha</th>
            <th>Saldo</th>
            <th>Tiempo</th>
            <th>Tratamiento</th>
            <th>Paciente</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($recibos as $recibo)
          <tr>
            <td>{{ $recibo->acj }}</td>
            <td>{{ $recibo->credito }}</td>
            <td>{{ $recibo->diente }}</td>
            <td>{{ $recibo->fecha }}</td>
            <td>{{ $recibo->saldo }}</td>
            <td>{{ $recibo->tiempo }}</td>
            <td>{{ $recibo->tratamiento }}</td>
            <td>{{ $recibo->consulta->pacienteid }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>BUCODENT</p>
    <p>{{ $fecha }}</p>
</body>
</html>