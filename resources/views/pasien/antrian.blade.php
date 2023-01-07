@extends('layouts.user_type.auth')

@section('content')

    <div>
        <div class="alert alert-secondary mx-4">
            <div class="ms-md-3 pe-md-3 d-flex align-items-center justify-content-between">
                <form action="/antrian" method="POST">
                    @csrf

                    <div class="input-group">
                        <select class="form-select" style="padding-right: 40px;" name="filter">
                            <option @if ($selected === 'semua') selected @endif value="semua">
                                Semua
                            </option>
                            <option @if ($selected === 'bpjs') selected @endif value="bpjs">
                                BPJS
                            </option>
                            <option @if ($selected === 'asuransi') selected @endif value="asuransi">
                                Asuransi
                            </option>
                            <option @if ($selected === 'umum') selected @endif value="umum">
                                Umum
                            </option>
                        </select>

                        <button class="btn btn-info mb-0" type="submit">
                            <i class="fas fa-filter" aria-hidden="true"></i>
                            Filter
                        </button>
                    </div>
                </form>

                <span class="text-white text-uppercase fw-bolder">
                    total pasien: {{ $patients->count() }}
                </span>
            </div>
        </div>

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
                                <h5 class="mb-0">Antrian Pasien</h5>
                            </div>

                            <a href="{{ url('tambah-pasien') }}" class="btn bg-gradient-primary btn-sm mb-0"
                                type="button">+&nbsp; Pasien</a>
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
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
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
                                                    <a href="/antrian/{{ $patient->id }}" class="mx-3"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-original-title="Edit dan lihat detail pasien">
                                                        <i class="fas fa-user-edit text-secondary"></i>
                                                    </a>

                                                    <form action="/antrian/{{ $patient->id }}" method="POST"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf

                                                        <button type="submit" data-bs-toggle="tooltip"
                                                            data-bs-original-title="Hapus pasien"
                                                            class="border-0 bg-transparent">
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
