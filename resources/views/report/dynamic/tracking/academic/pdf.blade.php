<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>pdf tracking academic report</title>
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
  <h2>REPORTE DINAMICO DE SEGUIMIENTOS ACADEMICOS</h2>
  <h5>Informacion filtrada por : @if(!empty($student_id)) Student ID = {{ $student_id }}, @endif @if(!empty($academic_name)) Nombre Esp. = {{ $academic_name }}, @endif @if(!empty($academic_type)) Tipo Esp. = {{ $academic_type }}, @endif @if(!empty($academic_status)) Estado Esp. = {{ $academic_status }}, @endif @if(!empty($student_name)) Nombre Estudiante = {{ $student_name }}, @endif @if(!empty($student_lastname)) Apellido Estudiante = {{ $student_lastname }}, @endif @if(!empty($academic_institute)) Nombre Instituto = {{ $academic_institute }}, @endif</h5>
    <table style="width: 100%">
      <thead>
        <tr>
          <th>Titulado</th>
          <th>Nombre Especialidad</th>
          <th>Tipo de Especialidad</th>
          <th>Estado</th>
          <th>Institución</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consults as $consult)
        <tr>
          <td>{{ $consult->student->student_lastname }} {{ $consult->student->student_name }}</td>
          <td>{{ $consult->academic_name }}</td>
          <td>{{ $consult->academic_type }}</td>
          <td>{{ $consult->academic_status }}</td>
          <td>{{ $consult->academic_institute }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>

</html>