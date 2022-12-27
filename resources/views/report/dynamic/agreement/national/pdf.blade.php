<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf agreement national report</title>
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
    <h2>REPORTE DINAMICO DE CONVENIOS NACIONALES</h2>
    <h5>Informacion filtrada por : @if(!empty($national_organization)) Nombre de Org. = {{ $national_organization }}, @endif @if(!empty($national_company)) Firma Empresa = {{ $national_company }}, @endif  @if(!empty($date_min) && !empty($date_max)) Rango Fechas = {{ $date_min }} a {{$date_max}}, @endif @if(!empty($national_uagrm)) Firma UAGRM = {{ $national_uagrm }}, @endif</h5>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Fecha de Convenio</th>
            <th>Nombre de Organización</th>
            <th>Firma UAGRM</th>
            <th>Firma Empresa</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($consults as $consult)
          <tr>
            <td>{{ $consult->national_date }}</td>
            <td>{{ $consult->national_organization }}</td>
            <td>{{ $consult->national_uagrm }}</td>
            <td>{{ $consult->national_company }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>