<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('building')->get();
        return view('rooms', compact('rooms'));
    }

    public function show(int $id)
    {
        $room = Room::with(['building', 'guests'])->findOrFail($id);
        return view('room', compact('room'));
    }
}
