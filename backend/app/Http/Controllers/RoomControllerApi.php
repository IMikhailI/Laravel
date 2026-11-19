<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomControllerApi extends Controller
{
    public function index(Request $request)
    {
        $page = max(0, (int) $request->query('page', 0));
        $perpage = max(1, (int) $request->query('perpage', 5));

        return response(Room::orderBy('id')->limit($perpage)->offset($page * $perpage)->get());
    }

    public function total()
    {
        return response(Room::count());
    }
    
    public function show(string $id)
    {
        return response(Room::find($id));
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
