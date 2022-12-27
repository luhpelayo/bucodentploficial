<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf visitas</title>
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
    <h2>VISITAS TECNICAS REGISTRADAS EN SISTEMA</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Fecha Visita</th>
            <th>Materia--Grupo</th>
            <th>Responsable UAGRM</th>
            <th>Empresa Visitada</th>
            <th>Responsable EMPRESA</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($visits as $visit)
          <tr>
            <td>{{ $visit->visit_date }}</td>
            <td>{{ $visit->matter->matter_initial }} {{ $visit->matter->matter_name }}--{{ $visit->matter->matter_group }}</td>
            <td>{{ $visit->visit_subjectuagrm }}</td>
            <td>{{ $visit->visit_company }}</td>
            <td>{{ $visit->visit_subjectcompany }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>