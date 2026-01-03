<!doctype html>
<html lang="ru">
<head><meta charset="UTF-8"><title>Комнаты</title></head>
<body>
<h1>Комнаты</h1>
<p><a href="/room/create">Добавить комнату</a></p>

<table border="1" cellpadding="6">
    <tr>
        <th>ID</th><th>Корпус</th><th>Номер</th><th>Мест</th><th>Цена</th><th>Редактировать</th><th>Удалить</th>
    </tr>
@foreach($rooms as $r)
    <tr>
        <td>{{ $r->id }}</td>
        <td>{{ $r->building?->name }}</td>
        <td>{{ $r->room_number }}</td>
        <td>{{ $r->beds_count }}</td>
        <td>{{ $r->price }}</td>
        <td><a href="/room/edit/{{ $r->id }}">Редактировать</a></td>
        <td>
        <a href="/room/destroy/{{ $r->id }}"
            onclick="return confirm('Удалить комнату?')">
            Удалить
        </a>
        </td>
    </tr>
@endforeach
</table>
</body>
</html>
