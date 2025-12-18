<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view('rooms', ['rooms' => Room::paginate($perpage)->withQueryString()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('rooms', [
            'rooms' => Room::all()->where('id', $id)->first()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('room_create', ['buildings' => Building::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_number' => 'required|unique:rooms|max:3',
            'price' => 'required|numeric:',
            'beds_count' => 'required|integer|max:5',
            'building_id' => 'integer',
        ]);
        $room = new Room($validated);
        $room->save();
        return redirect('/room');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('room_edit', [
            'room' => Room::all()->where('id', $id)->first(),
            'buildings' => Building::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'room_number' => 'required|max:3|unique:rooms,room_number,' .$id,
            'price' => 'required|numeric:',
            'beds_count' => 'required|integer|max:5',
            'building_id' => 'integer',
        ]);
        $room = Room::all()->where('id', $id)->first();
        $room->room_number = $validated['room_number'];
        $room->price = $validated['price'];
        $room->beds_count = $validated['beds_count'];
        $room->building_id = $validated['building_id'];
        $room->save();
        return redirect('/room');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Room::destroy($id);
        return redirect('/room');
    }
}
