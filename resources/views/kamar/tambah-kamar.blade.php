@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Informasi Kamar</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="/tambah-kamar" method="POST" role="form text-left">
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
                                    <input class="form-control" type="text" placeholder="Ex: Kamar No.1 (Harus unik)" id="namaKamar" name="namaKamar" value="{{ old('namaKamar') }}" >

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
                                    <input class="form-control" type="number" placeholder="Ex: 1 (Satuan Pasien)" id="kapasitasMaximum" name="kapasitasMaximum" value="{{ old('kapasitasMaximum') }}" >

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
                                        <option value="icu">ICU</option>
                                        <option value="sicu">SICU</option>
                                        <option value="hdu">HDU</option>
                                        <option value="nicu">NICU</option>
                                        <option value="ccu">CCU</option>
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
                                        <option value="kelas1">Kelas 1</option>
                                        <option value="kelas2">Kelas 2</option>
                                        <option value="kelas3">Kelas 3</option>
                                    </select>

                                    @error('pembayaran')
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
