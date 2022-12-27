<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>pdf practices report</title>
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
  <h2>REPORTE DINAMICO DE PRACTICAS INDUSTRIALES</h2>
  <h5>Informacion filtrada por : @if(!empty($student_id)) Student ID = {{ $student_id }}, @endif @if(!empty($matter_id)) Materia ID = {{ $matter_id }}, @endif @if(!empty($student_name)) Nombre Estudiante = {{ $student_name }}, @endif @if(!empty($student_lastname)) Apellido Estudiante = {{ $student_lastname }}, @endif @if(!empty($date_min) && !empty($date_max)) Rango de Fechas = {{ $date_min }} a {{$date_max}}, @endif @if(!empty($practice_description)) Observación = {{ $practice_description }}, @endif @if(!empty($company_id)) Empresa ID = {{ $company_id }}, @endif</h5>
    <table style="width: 100%">
      <thead>
        <tr>
          <th>Fecha de Práctica</th>
          <th>Registro</th>
          <th>Estudiante</th>
          <th>Materia--Grupo</th>
          <th>Docente Titular</th>
          <th>Empresa</th>
          <th>Contacto Empresa</th>
          <th>Observación</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consults as $consult)
        <tr>
          <td>{{ $consult->practice_date }}</td>
          <td>{{ $consult->student->student_register }}</td>
          <td>{{ $consult->student->student_lastname }} {{ $consult->student->student_name }} </td>
          <td>{{ $consult->matter->matter_initial }} {{ $consult->matter->matter_name }}--{{ $consult->matter->matter_group }}</td>
          <td>{{ $consult->matter->matter_teacher }}</td>
          <td>{{ $consult->company->company_name }}</td>
          <td>{{ $consult->company->company_contact }}</td>
          <td>{{ $consult->practice_description }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>

</html>