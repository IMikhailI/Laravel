<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('perpage', 5);

        $rooms = Room::with('building')->paginate($perPage)->withQueryString();

        return view('rooms', compact('rooms'));
    }
    public function show(int $id)
    {
        $room = Room::with(['building', 'guests'])->findOrFail($id);
        return view('room', compact('room'));
    }

    public function create()
    {
        $buildings = Building::all();
        return view('room_create', compact('buildings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'building_id' => ['required', 'integer', 'exists:building,id'],
            'room_number' => ['required', 'string', 'max:10'],
            'beds_count'  => ['required', 'integer', 'min:1', 'max:20'],
            'price'       => ['required', 'numeric', 'min:0'],
        ]);

        Room::create($validated);

        return redirect('/rooms');
    }

    public function edit(int $id)
    {
        $room = Room::findOrFail($id);
        if (!Gate::allows('edit-room', $room)) {
            return redirect('/error')->with(
                'message',
                'У вас нет разрешения на редактирование товара номер ' . $id
            );
        }
        $buildings = Building::all();
        return view('room_edit', compact('room', 'buildings'));
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'building_id' => ['required', 'integer', 'exists:building,id'],
            'room_number' => ['required', 'string', 'max:10'],
            'beds_count'  => ['required', 'integer', 'min:1', 'max:20'],
            'price'       => ['required', 'numeric', 'min:0'],
        ]);

        $room = Room::findOrFail($id);
        $room->update($validated);

        return redirect('/rooms');
    }

    public function destroy(string $id)
    {
        if (!Gate::allows('destroy-room', Room::all()->where('id', $id)->first())) {
            return redirect('/error')->with('message',
                'У вас нет разрешения на удаление товара номер ' . $id
            );
        }

        Room::destroy($id);
        return redirect('/room');
        ыфс
        фс
        фсы
        
    }
}
