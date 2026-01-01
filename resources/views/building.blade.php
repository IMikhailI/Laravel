<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Корпус</title>
</head>
<body>
  <h1>Корпус: {{ $building->name }}</h1>

  <h2>Комнаты</h2>

  @if($building->rooms->isEmpty())
    <p>Комнат нет</p>
  @else
    <table border="1" cellpadding="6">
      <tr>
        <th>ID</th>
         <th>Корпус</th>
        <th>Номер</th>
        <th>Мест</th>
        <th>Цена</th>
      </tr>

      @foreach($building->rooms as $r)
        <tr>
          <td>{{ $r->id }}</td>
          <td>{{ $building->name }}</td>
          <td>{{ $r->room_number }}</td>
          <td>{{ $r->beds_count }}</td>
          <td>{{ $r->price }}</td>
        </tr>
      @endforeach
    </table>
  @endif

</body>
</html>
