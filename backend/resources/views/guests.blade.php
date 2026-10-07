<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Гости</title>
</head>
<body>
  <h1>Гости</h1>

  <table border="1" cellpadding="6">
    <tr>
      <th>ID</th>
      <th>ФИО</th>
    </tr>
    @foreach($guests as $g)
      <tr>
        <td>{{ $g->id }}</td>
        <td>{{ $g->full_name }}</td>
      </tr>
    @endforeach
  </table>
</body>
</html>
