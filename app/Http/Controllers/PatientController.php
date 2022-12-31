<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // public function index()
    // {
    //     Patient::all()
    // }


    public function createAddPage()
    {
        return view('pasien/tambah-pasien');
    }

    public function createDetailPage()
    {
        return view('pasien/detail-pasien');
    }

    public function addPatient(Request $request)
    {
        $attributes = request()->validate([
            'namaPasien' => ['required', 'max:50'],
            'nik' => ['required', 'max:50'],
            'dokter' => ['required', 'max:50'],
            'noRekMedis' => ['required', 'max:50'],
            'pembayaran' => ['required'],
            'durasi' => ['required'],
        ]);

        Patient::create([
            'nama' => $attributes['namaPasien'],
            'nik' => $attributes['nik'],
            'dokter' => $attributes['dokter'],
            'noRekMedis' => $attributes['noRekMedis'],
            'pembayaran' => $attributes["pembayaran"],
            'durasi' => $attributes["durasi"],
        ]);


        return redirect('/tambah-pasien')->with('success', 'Pasien berhasil ditambahkan ke antrian');
    }

// /**
//  * Display the specified resource.
//  *
//  * @param  \App\Models\Patient  $patient
//  * @return \Illuminate\Http\Response
//  */
// public function show(Patient $patient)
// {
//     //
// }

// /**
//  * Show the form for editing the specified resource.
//  *
//  * @param  \App\Models\Patient  $patient
//  * @return \Illuminate\Http\Response
//  */
// public function edit(Patient $patient)
// {
//     //
// }

// /**
//  * Update the specified resource in storage.
//  *
//  * @param  \Illuminate\Http\Request  $request
//  * @param  \App\Models\Patient  $patient
//  * @return \Illuminate\Http\Response
//  */
// public function update(Request $request, Patient $patient)
// {
//     //
// }

// /**
//  * Remove the specified resource from storage.
//  *
//  * @param  \App\Models\Patient  $patient
//  * @return \Illuminate\Http\Response
//  */
// public function destroy(Patient $patient)
// {
//     //
// }
}