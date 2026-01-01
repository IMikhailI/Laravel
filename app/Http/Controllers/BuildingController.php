<?php

namespace App\Http\Controllers;

use App\Models\Building;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::all();
        return view('buildings', compact('buildings'));
    }

    public function show(int $id)
    {
        $building = Building::with('rooms')->findOrFail($id);
        return view('building', compact('building'));
    }
}
