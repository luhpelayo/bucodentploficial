<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf tomos</title>
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
    <h2>TRABAJOS FINALES REGISTRADOS EN EL SISTEMA</h2>
    <table style="width: 100%">
        <thead >
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
          @foreach ($tomos as $tomo)
          <tr>
            <td>{{ $tomo->tomo_code }}</td>
            <td>{{ $tomo->student->student_lastname }} {{ $tomo->student->student_name }} </td>
            <td>{{ $tomo->tomo_title }}</td>
            <td>{{ $tomo->modality->modality_name }}</td>
            <td>{{ $tomo->category->category_name }}</td>
            <td>{{ $tomo->tomo_consultant }}</td>
            <td>{{ $tomo->tomo_year }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>