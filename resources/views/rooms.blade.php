@extends('layout')
@section('content')
<div class="container" style="margin-top: 80px">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="m-0">Список комнат</h2>
        <a href="{{ url('room/create') }}" class="btn btn-primary">Добавить комнату</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Корпус</th>
                <th>Номер</th>
                <th>Мест</th>
                <th>Цена</th>
                <th>Удалить / Редактировать</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->building?->name }}</td>
                    <td>{{ $room->room_number }}</td>
                    <td>{{ $room->beds_count }}</td>
                    <td>{{ $room->price }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ url('room/destroy/'.$room->id) }}" class="btn btn-danger"
                           onclick="return confirm('Удалить комнату?')">Удалить</a>
                        <a href="{{ url('room/edit/'.$room->id) }}" class="btn btn-primary">Редактировать</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $rooms->links() }}
</div>
@endsection
