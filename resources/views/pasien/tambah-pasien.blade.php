@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Informasi Pasien</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="/admin-profile" method="POST" role="form text-left">
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
                                <label for="namaPasien" class="form-control-label">{{ __('Nama Pasien') }}</label>

                                <div class="@error('namaPasien')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Ex: John Doe" id="namaPasien" name="namaPasien" />

                                    @error('namaPasien')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik" class="form-control-label">{{ __('NIK') }}</label>

                                <div class="@error('nik')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Ex: 2171XXXXXXXXXX" id="nik" name="nik">

                                    @error('nik')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dokter" class="form-control-label">{{ __('Dokter') }}</label>

                                <div class="@error('dokter')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Ex: Dr.Jane Doe" id="dokter" name="dokter">

                                    @error('dokter')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no-rek-medis" class="form-control-label">{{ __('No Rek Medis') }}</label>

                                <div class="@error('no-rek-medis') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Ex: 123ZYB444XXXX" id="no-rek-medis" name="no-rek-medis">

                                    @error('no-rek-medis')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pembayaran" class="form-control-label">{{ __('Pembayaran') }}</label>

                                <div class="@error('pembayaran') border border-danger rounded-3 @enderror">
                                    <select class="form-select">
                                        <option value="BPJS">BPJS</option>
                                        <option value="Asuransi">Asuransi</option>
                                        <option value="Umum">Umum</option>
                                    </select>

                                    @error('pembayaran')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="durasi" class="form-control-label">{{ __('Durasi') }}</label>

                                <div class="@error('durasi') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="number" placeholder="Dalam satuan hari" id="durasi" name="durasi">

                                    @error('durasi')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Tambah' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
