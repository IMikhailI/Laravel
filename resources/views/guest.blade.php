<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Гость</title>
</head>
<body>
  <h1>Гость: {{ $guest->full_name }}</h1>

  <h2>Комнаты (many-to-many через booking)</h2>

  @if($guest->rooms->isEmpty())
    <p>Бронирований нет</p>
  @else
    <table border="1" cellpadding="6">
      <tr>
        <th>ID комнаты</th>
        <th>Номер</th>
        <th>Дата начала</th>
        <th>Дата окончания</th>
        <th>Кол-во человек</th>
      </tr>
      @foreach($guest->rooms as $r)
        <tr>
          <td>{{ $r->id }}</td>
          <td>{{ $r->room_number }}</td>
          <td>{{ $r->pivot->date_start }}</td>
          <td>{{ $r->pivot->date_end }}</td>
          <td>{{ $r->pivot->people_count }}</td>
        </tr>
      @endforeach
    </table>
  @endif

</body>
</html>
