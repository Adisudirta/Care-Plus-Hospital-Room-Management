<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all([
            'id',
            'nama',
            'noRekMedis',
            'pembayaran',
            'durasi',
        ]);

        return view('pasien/antrian', ['selected' => 'semua', 'patients' => $patients]);
    }

    public function filter(Request $request)
    {

        if ($request->filter === 'semua') {
            $selected = 'semua';
            $patients = Patient::all([
                'id',
                'nama',
                'noRekMedis',
                'pembayaran',
                'durasi',
            ]);

        } else if ($request->filter === 'bpjs') {
            $selected = 'bpjs';
            $patients = Patient::where('pembayaran', $request->filter)->get();

        } else if ($request->filter === 'umum') {
            $selected = 'umum';
            $patients = Patient::where('pembayaran', $request->filter)->get();
        } else {
            $selected = 'asuransi';
            $patients = Patient::where('pembayaran', $request->filter)->get();
        }

        return view('pasien/antrian', ['selected' => $selected, 'patients' => $patients]);
    }


    public function createAddPage()
    {
        return view('pasien/tambah-pasien');
    }

    public function createDetailPage(Patient $patient)
    {
        return view('pasien/detail-pasien', ['patient' => $patient]);
    }

    public function destroy(Patient $patient)
    {
        Patient::destroy($patient->id);
        return redirect(url("/antrian"))->with('success', 'Pasien berhasil dihapus');
    }

    public function edit(Request $request, Patient $patient)
    {
        $attributes = request()->validate([
            'namaPasien' => ['required', 'max:50'],
            'nik' => ['required', 'max:50', Rule::unique('patients', 'nik')->ignore($patient->id)],
            'dokter' => ['required', 'max:50'],
            'noRekMedis' => ['required', 'max:50', Rule::unique('patients', 'noRekMedis')->ignore($patient->id)],
            'pembayaran' => ['required'],
            'durasi' => ['required'],
        ]);

        $patient->update([
            'nama' => $attributes['namaPasien'],
            'nik' => $attributes['nik'],
            'dokter' => $attributes['dokter'],
            'noRekMedis' => $attributes['noRekMedis'],
            'pembayaran' => $attributes["pembayaran"],
            'durasi' => $attributes["durasi"],
        ]);

        return redirect(url("/antrian/{$patient->id}"))->with('success', 'Data pasien berhasil diperbarui');
    }

    public function addPatient(Request $request)
    {
        $attributes = request()->validate([
            'namaPasien' => ['required', 'max:50'],
            'nik' => ['required', 'max:50', Rule::unique('patients', 'nik')],
            'dokter' => ['required', 'max:50'],
            'noRekMedis' => ['required', 'max:50', Rule::unique('patients', 'noRekMedis')],
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
}