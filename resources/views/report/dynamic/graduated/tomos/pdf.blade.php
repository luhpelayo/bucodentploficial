<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>pdf tomos report</title>
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
  <h2>REPORTE DINAMICO DE TRABAJOS FINALES DE GRADO</h2>
  <h5>Informacion filtrada por : @if(!empty($modality_id)) Modalidad ID = {{ $modality_id }}, @endif @if(!empty($category_id)) Category ID = {{ $category_id }}, @endif @if(!empty($student_name)) Nombre Estudiante = {{ $student_name }}, @endif @if(!empty($student_lastname)) Apellido Estudiante = {{ $student_lastname }}, @endif @if(!empty($year_min) && !empty($year_max)) Rango de Años = {{ $year_min }} a {{$year_max}}, @endif @if(!empty($tomo_title)) Titulo TFG = {{ $tomo_title }}, @endif @if(!empty($tomo_consultant)) Asesor = {{ $tomo_consultant }}, @endif</h5>
    <table style="width: 100%">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Estudiante</th>
          <th>Título</th>
          <th>Modalidad</th>
          <th>Categoría</th>
          <th>Asesor</th>
          <th>Año</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consults as $consult)
        <tr>
          <td>{{ $consult->tomo_code }}</td>
          <td>{{ $consult->student->student_lastname }} {{ $consult->student->student_name }} </td>
          <td>{{ $consult->tomo_title }}</td>
          <td>{{ $consult->modality->modality_name }}</td>
          <td>{{ $consult->category->category_name }}</td>
          <td>{{ $consult->tomo_consultant }}</td>
          <td>{{ $consult->tomo_year }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>

</html>