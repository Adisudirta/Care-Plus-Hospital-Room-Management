<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Room;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    public function index(Room $room)
    {
        if ($room->status === 'penuh') {
            return redirect()->back()->withErrors(['msg' => 'Kamar sudah penuh']);
        } else {
            $patients = Patient::where('room_id', null)->get();
            return view('pasien/reservasi', ['room' => $room, 'patients' => $patients]);
        }
    }

    public function add(Request $request)
    {
        $patient = Patient::find($request->patientId);
        $room = Room::find($request->roomId);

        if ($room->patient->count() === $room->kapasitasMaximum) {
            $room->status = 'penuh';
            $room->save();

            return redirect("/kamar/{$room->id}")->withErrors(['msg' => 'Kamar sudah penuh']);
        } else {
            $patient->room_id = $room->id;
            $patient->checkIn = date('Y-m-d H:i:s');
            $patient->save();

            $patient->checkOut = date('Y-m-d H:i:s', strtotime(sprintf('+%s day', $patient->durasi)));
            $patient->save();

            return redirect("/reservasi-pasien/{$room->id}")->with('success', 'Pasien berhasil ditambahkan ke kamar');
        }
    }
}