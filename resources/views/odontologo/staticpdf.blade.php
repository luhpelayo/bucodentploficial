<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf odontologo</title>
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
    <h2>ODONTOLOGOS REGISTRADOS EN EL SISTEMA</h2>
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
            <th>ESPECIALIDAD</th>
            <th>RUC</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($odontologos as $odontologo)
          <tr>
            <td>{{ $odontologo->apellido }}</td>
            <td>{{ $odontologo->nombre }}</td>
            <td>{{ $odontologo->ci }}</td>
            <td>{{ $odontologo->fechanacimiento }}</td>
            <td>{{ $odontologo->direccion }}</td>
            <td>{{ $odontologo->telefono }}</td>
            <td>{{ $odontologo->email }}</td>
            <td>{{ $odontologo->especialidad }}</td>
            <td>{{ $odontologo->ruc }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>Bucodent</p>
    <p>{{ $fecha }}</p>
</body>
</html>