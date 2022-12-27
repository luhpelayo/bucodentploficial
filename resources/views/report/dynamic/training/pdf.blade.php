<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf courses report</title>
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
    <h2>REPORTE DINAMICO DE CURSOS Y TALLERES</h2>
    <h5>Informacion filtrada por : @if(!empty($training_name)) Nombre Curso = {{ $training_name }}, @endif @if(!empty($training_teacher)) Docente = {{ $training_teacher }}, @endif  @if(!empty($date_min) && !empty($date_max)) Rango Fechas = {{ $date_min }} a {{$date_max}}, @endif @if(!empty($quantity_min) && !empty($quantity_max)) Cantidad Inscritos = {{ $quantity_min }} a {{$quantity_max}} Inscritos, @endif @if(!empty($money_min) && !empty($money_max)) Rango Recaudación = {{ $money_min }} Bs a {{$money_max}} Bs, @endif</h5>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Nombre del Curso</th>
            <th>Duración en Fecha</th>
            <th>Docente</th>
            <th>Inscritos</th>
            <th>Recaudación</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($consults as $consult)
          <tr>
            <td>{{ $consult->training_name }}</td>
            <td>desde:{{ $consult->training_stardate}} hasta:{{ $consult->training_endate}}</td>
            <td>{{ $consult->training_teacher }}</td>
            <td>{{ $consult->training_quantity }}</td>
            <td>{{ $consult->training_money }} Bs</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>