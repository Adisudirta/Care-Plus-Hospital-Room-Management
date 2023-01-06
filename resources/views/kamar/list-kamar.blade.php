@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4">
        <div class="ms-md-3 pe-md-3 d-flex align-items-center justify-content-between">
            <form action="/kamar" method="POST">
                @csrf

                <div class="input-group">
                    <select class="form-select" style="padding-right: 40px;" name="filter">
                        <option
                            @if($selected === "semua") 
                            selected
                            @endif
                            value="semua"
                        >
                            Semua
                        </option>
                        <option
                            @if($selected === "penuh") 
                            selected
                            @endif 
                            value="penuh"
                        >
                            Penuh
                        </option>
                        <option
                            @if($selected === "dapatDiisi") 
                            selected
                            @endif  
                            value="dapatDiisi"
                        >
                            Dapat Diisi
                        </option>
                    </select>

                    <button class="btn btn-info mb-0" type="submit">
                        <i class="fas fa-filter" aria-hidden="true"></i>
                        Filter
                    </button>
                </div>
            </form>

            <span class="text-white text-uppercase fw-bolder">
                total kamar: {{$rooms->count()}}
            </span>
        </div>
    </div>

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
        <div class="col-12">
            <div class="card mb-4 mx-4" style="min-height: 500px;">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">List Kamar</h5>
                        </div>

                        <a href="{{ url('tambah-kamar') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; kamar</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Kamar
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Jumlah Pasien
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Kapasitas Maximum
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Urgensi
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kelas
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @isset($rooms)
                                @foreach($rooms as $room)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $room->namaKamar }}</p>
                                    </td>
                                    <td>
                                        <p class="text-center text-xs font-weight-bold mb-0">{{ $room->patient->count() }} Pasien</p>
                                    </td>
                                    <td>
                                        <p class="text-center text-xs font-weight-bold mb-0">{{ $room->kapasitasMaximum }} Pasien</p>
                                    </td>
                                    <td>
                                        <p class="text-center text-xs font-weight-bold mb-0 text-uppercase">{{ $room->urgensi }}</p>
                                    </td>
                                    <td class="text-center text-uppercase">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            @if($room->kelas === 'kelas1')                                    
                                            <span class="badge badge-sm bg-gradient-warning">
                                                Kelas 1
                                            </span>                     
                                            @elseif($room->kelas === 'kelas2')
                                            <span class="badge badge-sm bg-gradient-info">
                                                Kelas 2
                                            </span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-danger">
                                                Kelas 3
                                            </span>       
                                            @endif                                   
                                        </span>
                                    </td>
                                    <td class="text-center">
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
                                    </td>                                
                                    <td class="text-center">
                                        <a href="/kamar/{{ $room->id }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Tambahkan pasien ke kamar">
                                            <i class="fas fa fa-pencil-square-o text-secondary"></i>
                                        </a>

                                        <form action="/kamar/{{ $room->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf

                                            <button type="submit" data-bs-toggle="tooltip" data-bs-original-title="Hapus kamar" class="border-0 bg-transparent">
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
