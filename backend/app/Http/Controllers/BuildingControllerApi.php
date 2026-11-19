<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;

class BuildingControllerApi extends Controller
{
    public function index(Request $request)
    {
        $page = max(0, (int) $request->query('page', 0));
        $perpage = max(1, (int) $request->query('perpage', 5));

        return response(Building::orderBy('id')->limit($perpage)->offset($page * $perpage)->get());
    }

    public function total()
    {
        return response(Building::count());
    }

    public function show(string $id)
    {
        return response(Building::find($id));
    }
    
    public function store(Request $request)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
