<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>pdf defense acta report</title>
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
  <h2>REPORTE DINAMICO DE ACTAS DE DEFENSA</h2>
  <h5>Informacion filtrada por : @if(!empty($acta_code)) Codigo = {{ $acta_code }}, @endif @if(!empty($note_min) &&
    !empty($note_max)) Rango Nota = {{ $note_min }} a {{$note_max}}, @endif @if(!empty($date_min) && !empty($date_max))
    Rango Fechas = {{ $date_min }} a {{$date_max}}, @endif @if(!empty($acta_court)) Tribunal = {{ $acta_court }}, @endif
    @if(!empty($modality_id)) Modalidad ID = {{ $modality_id }}, @endif</h5>
  <table style="width: 100%">
    <thead>
      <tr>
        <th>Codigo Acta</th>
        <th>Estudiante</th>
        <th>Modalidad</th>
        <th>Título TFG</th>
        <th>Tribunal de Defensa</th>
        <th>Nota</th>
        <th>Fecha y Hora</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($consults as $consult)
      <tr>
        <td>{{ $consult->acta_code }}</td>
        <td>{{ $consult->tomo->student->student_lastname }} {{ $consult->tomo->student->student_name }}</td>
        <td>{{ $consult->tomo->modality->modality_name }}</td>
        <td>{{ $consult->tomo->tomo_title }}</td>
        <td>{{ $consult->acta_court }}</td>
        <td>{{ $consult->acta_note }}</td>
        <td>{{ $consult->acta_date }}, {{ $consult->acta_hour }} </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <p>Cantidad de Registros:{{ $cantidad }}</p>
  <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
  <p>{{ $fecha }}</p>
</body>

</html>