<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить комнату</title>
</head>
<body>

<h1>Добавить комнату</h1>

@if ($errors->any())
    <div style="border:1px solid red; padding:10px; width: fit-content;">
        <b>Ошибки валидации:</b>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/room">
    @csrf

    <table border="1" cellpadding="6">
        <tr>
            <th>Корпус</th>
            <td>
                <select name="building_id">
                    <option value="">-- выберите корпус --</option>
                    @foreach($buildings as $b)
                        <option value="{{ $b->id }}" {{ old('building_id') == $b->id ? 'selected' : '' }}>
                            {{ $b->name }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>

        <tr>
            <th>Номер комнаты</th>
            <td>
                <input type="text" name="room_number" value="{{ old('room_number') }}">
            </td>
        </tr>

        <tr>
            <th>Количество мест</th>
            <td>
                <input type="number" name="beds_count" value="{{ old('beds_count') }}">
            </td>
        </tr>

        <tr>
            <th>Цена</th>
            <td>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}">
            </td>
        </tr>
    </table>

    <p>
        <button type="submit">Сохранить</button>
        <a href="/rooms">Назад</a>
    </p>
</form>

</body>
</html>
