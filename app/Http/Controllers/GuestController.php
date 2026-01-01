<?php

namespace App\Http\Controllers;

use App\Models\Guest;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        return view('guests', compact('guests'));
    }

    public function show(int $id)
    {
        $guest = Guest::with('rooms')->findOrFail($id);
        return view('guest', compact('guest'));
    }
}
