<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Комната</title>
</head>
<body>
  <h1>Комната {{ $room->room_number }}</h1>

  <table border="1" cellpadding="6">
    <tr><th>Корпус</th><td>{{ $room->building->name }}</td></tr>
    <tr><th>Мест</th><td>{{ $room->beds_count }}</td></tr>
    <tr><th>Цена</th><td>{{ $room->price }}</td></tr>
  </table>

  <h2>Гости (many-to-many через booking)</h2>

  @if($room->guests->isEmpty())
    <p>Бронирований нет</p>
  @else
    <table border="1" cellpadding="6">
      <tr>
        <th>ID гостя</th><th>ФИО</th><th>Дата начала</th>
        <th>Дата окончания</th><th>Кол-во человек</th>
      </tr>
      @foreach($room->guests as $g)
        <tr>
          <td>{{ $g->id }}</td>
          <td>{{ $g->full_name }}</td>
          <td>{{ $g->pivot->date_start }}</td>
          <td>{{ $g->pivot->date_end }}</td>
          <td>{{ $g->pivot->people_count }}</td>
        </tr>
      @endforeach
    </table>
  @endif

</body>
</html>
