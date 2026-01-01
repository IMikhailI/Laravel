<!doctype html>
<html lang="ru">
<head><meta charset="UTF-8"><title>Комнаты</title></head>
<body>
<h1>Комнаты</h1>
<table border="1" cellpadding="6">
    <tr>
        <th>ID</th><th>Корпус</th><th>Номер</th><th>Мест</th><th>Цена</th>
    </tr>
@foreach($rooms as $r)
    <tr>
        <td>{{ $r->id }}</td>
        <td>{{ $r->building?->name }}</td>
        <td>{{ $r->room_number }}</td>
        <td>{{ $r->beds_count }}</td>
        <td>{{ $r->price }}</td>
    </tr>
@endforeach
</table>
</body>
</html>
