<!doctype html>
<html lang="ru">
<head><meta charset="UTF-8"><title>Корпуса</title></head>
<body>
<h1>Корпуса</h1>
<ul>
@foreach($buildings as $b)
    <li>
        {{ $b->name }}
    </li>
@endforeach
</ul>
</body>
</html>
