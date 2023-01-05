<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();

        return view('kamar/list-kamar', ['selected' => 'semua', 'rooms' => $rooms]);
    }


    public function createAddPage()
    {
        return view('kamar/tambah-kamar');
    }

    public function addRoom(Request $request)
    {
        $attributes = request()->validate([
            'namaKamar' => ['required', 'max:50', Rule::unique('rooms', 'namaKamar')],
            'kapasitasMaximum' => ['required'],
            'urgensi' => ['required'],
            'kelas' => ['required'],
        ]);

        Room::create([
            'namaKamar' => $attributes['namaKamar'],
            'kapasitasMaximum' => $attributes['kapasitasMaximum'],
            'urgensi' => $attributes['urgensi'],
            'kelas' => $attributes['kelas'],
        ]);


        return redirect('/tambah-kamar')->with('success', 'Kamar berhasil ditambahkan ke antrian');
    }

    public function createDetailPage(Room $room)
    {
        return view('kamar/detail-kamar', ['room' => $room]);
    }

    public function edit(Request $request, Room $room)
    {
        $attributes = request()->validate([
            'namaKamar' => ['required', 'max:50', Rule::unique('rooms', 'namaKamar')->ignore($room->id)],
            'kapasitasMaximum' => ['required'],
            'urgensi' => ['required'],
            'kelas' => ['required'],
        ]);

        $room->update([
            'namaKamar' => $attributes['namaKamar'],
            'kapasitasMaximum' => $attributes['kapasitasMaximum'],
            'urgensi' => $attributes['urgensi'],
            'kelas' => $attributes['kelas'],
        ]);

        return redirect(url("/kamar/{$room->id}"))->with('success', 'Data kamar berhasil diperbarui');
    }

    public function destroy(Room $room)
    {
        Room::destroy($room->id);
        return redirect(url("/kamar"))->with('success', 'Kamar berhasil dihapus');
    }
}