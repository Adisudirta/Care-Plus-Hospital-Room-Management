@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved6.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>

        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="../assets/img/room-default-profile.png" alt="{{ $room->namaKamar }}" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>

                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $room->namaKamar }}
                        </h5>

                        <div class="d-flex align-items-center">
                            <p class="mb-0 me-2 font-weight-bold text-sm">
                                {{ $room->patient->count() }} / {{$room->kapasitasMaximum}}
                            </p>
                            
                            <span class="text-secondary text-xs font-weight-bold">
                                @if($room->status === 'dapatDiisi')                                            
                                <span class="badge badge-sm bg-gradient-success">
                                    Dapat Diisi
                                </span>                            
                                @else
                                <span class="badge badge-sm bg-gradient-secondary">
                                    Penuh
                                </span>  
                                @endif
                            </span>    
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Informasi Kamar</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="/kamar/{{ $room->id }}" method="POST" role="form text-left">
                    @csrf

                    @if($errors->any())
                    <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-text text-white">
                            {{$errors->first()}}
                        </span>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                    @endif

                    @if(session('success'))
                    <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                        <span class="alert-text text-white">
                            {{ session('success') }}
                        </span>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaKamar" class="form-control-label">{{ __('Nama Kamar') }}</label>

                                <div class="@error('namaKamar')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Ex: Kamar No.1 (Harus unik)" id="namaKamar" name="namaKamar" value="{{ $room->namaKamar }}" >

                                    @error('namaKamar')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kapasitasMaximum" class="form-control-label">{{ __('Kapasitas Maximum') }}</label>

                                <div class="@error('kapasitasMaximum')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="number" placeholder="Ex: 1 (Satuan Pasien)" id="kapasitasMaximum" name="kapasitasMaximum" value="{{ $room->kapasitasMaximum }}" >

                                    @error('kapasitasMaximum')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="urgensi" class="form-control-label">{{ __('Urgensi') }}</label>

                                <div class="@error('urgensi') border border-danger rounded-3 @enderror">
                                    <select class="form-select" name="urgensi">
                                        <option 
                                            @if($room->urgensi === 'icu')
                                            selected
                                            @endif
                                            value="icu"
                                        >
                                            ICU
                                        </option>
                                        <option 
                                            @if($room->urgensi === 'sicu')
                                            selected
                                            @endif
                                            value="sicu"
                                        >
                                            SICU
                                        </option>
                                        <option 
                                            @if($room->urgensi === 'hdu')
                                            selected
                                            @endif
                                            value="hdu"
                                        >
                                            HDU
                                        </option>
                                        <option 
                                            @if($room->urgensi === 'nicu')
                                            selected
                                            @endif
                                            value="nicu"
                                        >
                                            NICU
                                        </option>
                                        <option 
                                            @if($room->urgensi === 'ccu')
                                            selected
                                            @endif
                                            value="ccu"
                                        >
                                            CCU
                                        </option>
                                        <option value="pacu">PACU</option>
                                    </select>

                                    @error('urgensi')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kelas" class="form-control-label">{{ __('Kelas') }}</label>

                                <div class="@error('kelas') border border-danger rounded-3 @enderror">
                                    <select class="form-select" name="kelas">
                                        <option 
                                            @if($room->kelas === 'kelas1')
                                            selected
                                            @endif
                                            value="kelas1"
                                        >
                                            Kelas 1
                                        </option>
                                        <option 
                                            @if($room->kelas === 'kelas2')
                                            selected
                                            @endif
                                            value="kelas2"
                                        >
                                            Kelas 2
                                        </option>
                                        <option 
                                            @if($room->kelas === 'kelas2')
                                            selected
                                            @endif
                                            value="kelas3"
                                        >
                                            Kelas 3
                                        </option>
                                    </select>

                                    @error('pembayaran')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Simpan' }}</button>
                    </div>
                </form>
            </div>
        </div>   
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4" style="min-height: 300px;">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Pasien di Kamar Ini</h5>
                        </div>

                        <a href="/reservasi-pasien/{{$room->id}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Pasien</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Pasien
                                    </th>                    
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Durasi Rawat Inap
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Check In
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Check Out
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Pembayaran
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @isset($patients)
                                @foreach($patients as $patient)
                                <tr>
                                    <td>
                                        <p class="text-center text-xs font-weight-bold mb-0">{{ $patient->nama }}</p>
                                    </td>                            
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $patient->durasi }} Hari</p>
                                    </td>
                                    <td class="ps-4">
                                        <p class="text-center text-xs font-weight-bold mb-0">{{ \Carbon\Carbon::parse($patient->checkIn)->format('d-m-Y') }}</p>
                                    </td>
                                    <td class="ps-4">
                                        <p class="text-center text-xs font-weight-bold mb-0">{{ \Carbon\Carbon::parse($patient->checkOut)->format('d-m-Y') }}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            @if($patient->pembayaran === 'BPJS')
                                            <span class="badge badge-sm bg-gradient-success">
                                                {{ $patient->pembayaran }}
                                            </span>
                                            @elseif($patient->pembayaran === 'Asuransi')
                                            <span class="badge badge-sm bg-gradient-warning">
                                                {{ $patient->pembayaran }}
                                            </span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-info">
                                                {{ $patient->pembayaran }}
                                            </span>
                                            @endif
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="/antrian/{{  $patient->id }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit dan lihat detail pasien">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>

                                        <form action="/antrian/{{ $patient->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf

                                            <button type="submit" data-bs-toggle="tooltip" data-bs-original-title="Hapus pasien" class="border-0 bg-transparent">
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>    
                                            </button>
                                        </form>                        
                                    </td>
                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
