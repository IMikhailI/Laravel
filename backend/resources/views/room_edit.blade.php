@extends('layout')
@section('content')
<div class="container" style="margin-top: 80px">
    <div class="row justify-content-center">
        <div class="col-6">
            <h2 class="mb-4">Редактировать комнату</h2>

            <form method="post" action="{{ url('room/update/' . $room->id) }}">
                @csrf

                <div class="mb-3">
                    <label for="building_id" class="form-label">Корпус</label>
                    <select
                        id="building_id"
                        name="building_id"
                        class="form-select @error('building_id') is-invalid @enderror"
                    >
                        @foreach($buildings as $building)
                            <option
                                value="{{ $building->id }}"
                                @selected(old('building_id', $room->building_id) == $building->id)
                            >
                                {{ $building->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('building_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="room_number" class="form-label">Номер комнаты</label>
                    <input
                        id="room_number"
                        type="text"
                        name="room_number"
                        value="{{ old('room_number', $room->room_number) }}"
                        class="form-control @error('room_number') is-invalid @enderror"
                    >
                    @error('room_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="beds_count" class="form-label">Количество мест</label>
                    <input
                        id="beds_count"
                        type="text"
                        name="beds_count"
                        value="{{ old('beds_count', $room->beds_count) }}"
                        class="form-control @error('beds_count') is-invalid @enderror"
                    >
                    @error('beds_count')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Цена</label>
                    <input
                        id="price"
                        type="text"
                        name="price"
                        value="{{ old('price', $room->price) }}"
                        class="form-control @error('price') is-invalid @enderror"
                    >
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Обновить</button>
                <a class="btn btn-link" href="{{ url('rooms') }}">Назад</a>
            </form>
        </div>
    </div>
</div>
@endsection
