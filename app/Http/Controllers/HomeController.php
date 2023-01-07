<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return redirect('dashboard');
    }

    public function createDashboardPage()
    {
        $patients = Patient::all();
        $rooms = Room::all();

        return view('dashboard', ['patients' => $patients, 'rooms' => $rooms]);
    }
}