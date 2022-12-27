<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf student report</title>
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
    <h2>REPORTE DINAMICO DE ESTUDIANTES</h2>
    <h5>Informacion filtrada por : @if(!empty($name)) Nombre = {{ $name }}, @endif @if(!empty($lastname)) Apellido = {{ $lastname }}, @endif @if(!empty($register)) Registro = {{ $register }}, @endif @if(!empty($ci)) Nro de CI = {{ $ci }}, @endif @if(!empty($exp)) Lugar Exp = {{ $exp }}, @endif @if(!empty($number)) Nro Celular = {{ $number }}, @endif</h5>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Registro</th>
            <th>Nro de CI</th>
            <th>Celular</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($consults as $consult)
          <tr>
            <td>{{ $consult->student_name }}</td>
            <td>{{ $consult->student_lastname }}</td>
            <td>{{ $consult->student_register }}</td>
            <td>{{ $consult->student_ci }} {{ $consult->student_exp }}</td>
            <td>{{ $consult->student_number }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>