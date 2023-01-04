<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf paciente</title>
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
    <h2>PACIENTES REGISTRADOS EN EL SISTEMA</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>APELLIDOS</th>
            <th>NOMBRE</th>
            <th>CI</th>
            <th>FECHA NACIMIENTO</th>
            <th>DIRECCION</th>
            <th>TELEFONO</th>
            <th>EMAIL</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pacientes as $paciente)
          <tr>
            <td>{{ $paciente->apellido }}</td>
            <td>{{ $paciente->nombre }}</td>
            <td>{{ $paciente->ci }}</td>
            <td>{{ $paciente->fechanacimiento }}</td>
            <td>{{ $paciente->direccion }}</td>
            <td>{{ $paciente->telefono }}</td>
            <td>{{ $paciente->email }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>Bucodent</p>
    <p>{{ $fecha }}</p>
</body>
</html>