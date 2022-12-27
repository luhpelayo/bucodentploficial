<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>pdf tracking work report</title>
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
  <h2>REPORTE DINAMICO DE SEGUIMIENTOS LABORALES</h2>
  <h5>Informacion filtrada por : @if(!empty($student_id)) Student ID = {{ $student_id }}, @endif @if(!empty($work_company)) Empresa = {{ $work_company }}, @endif @if(!empty($work_status)) Estado = {{ $work_status }}, @endif @if(!empty($work_role)) Cargo = {{ $work_role }}, @endif @if(!empty($student_name)) Nombre Titulado = {{ $student_name }}, @endif @if(!empty($student_lastname)) Apellido Titulado = {{ $student_lastname }}, @endif @if(!empty($work_activities)) Funciones = {{ $work_activities }}, @endif @if(!empty($work_references)) Referencia = {{ $work_references }}, @endif</h5>
    <table style="width: 100%">
      <thead>
        <tr>
          <th>Titulado</th>
          <th>Nombre de Empresa</th>
          <th>Cargo Ejercido</th>
          <th>Estado</th>
          <th>Duración en Fecha</th>
          <th>Funciones realizadas</th>
          <th>Referencia Empresa</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consults as $consult)
        <tr>
          <td>{{ $consult->student->student_lastname }} {{ $consult->student->student_name }}</td>
          <td>{{ $consult->work_company }}</td>
          <td>{{ $consult->work_role }}</td>
          <td>{{ $consult->work_status }}</td>
          <td>
            @if(!empty($consult->work_endate))
            desde:{{ $consult->work_stardate }} hasta:{{ $consult->work_endate }}
            @else()
            desde:{{ $consult->work_stardate }} hasta: Actualidad
            @endif
          </td>
          <td>{{ $consult->work_activities }}</td>
          <td>{{ $consult->work_references }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>

</html>