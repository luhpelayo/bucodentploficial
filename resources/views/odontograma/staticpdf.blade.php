<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf odontograma</title>
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
    <h2>ODONTOGRAMAS REGISTRADOS EN EL SISTEMA</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            
        <th>Tratamiento</th>
        <th>Diente</th>
        <th>Parte</th>
        <th>Diagnostico</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($odontogramas as $odontograma)
          <tr>
            
          

        <td>{{ $odontograma->tratamientoid }} </td>
        <td>{{ $odontograma->dienteid }} </td>
        <td>{{ $odontograma->parteid }} </td>
        <td>{{ $odontograma->diagnostico }} </td>
        <td>{{ $odontograma->fechainicio }}</td>
        <td>{{ $odontograma->fechafin}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>BUCODENT</p>
    <p>{{ $fecha }}</p>
</body>
</html>