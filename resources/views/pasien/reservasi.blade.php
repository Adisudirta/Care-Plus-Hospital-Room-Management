@extends('layouts.user_type.auth')

@section('content')

    @if ($errors->any())
        <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
            <span class="alert-text text-white">
                {{ $errors->first() }}
            </span>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
    @endif

    @if (session('success'))
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
                            <h5 class="mb-0">Reservasi Pasien</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No Antrian
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Pasien
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No Rek Medis
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Durasi Rawat Inap
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Pembayaran
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @isset($patients)
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-center text-xs font-weight-bold mb-0">{{ $patient->id }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $patient->nama }}</p>
                                            </td>
                                            <td class="text-center text-uppercase">
                                                <p class="text-xs font-weight-bold mb-0">{{ $patient->noRekMedis }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $patient->durasi }} Hari</p>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    @if ($patient->pembayaran === 'BPJS')
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
                                                <form action="/reservasi-pasien/{{ $room->id }}/{{ $patient->id }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Tambahkan pasien ke kamar"
                                                        class="border-0 bg-transparent">
                                                        <i class="cursor-pointer fas fa-address-book text-secondary"></i>
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

@endsection
