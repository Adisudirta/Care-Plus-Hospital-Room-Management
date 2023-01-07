@extends('layouts.user_type.auth')

@section('content')
    <div class="page-header min-height-300 border-radius-xl mb-4"
        style="background-image: url('../assets/img/dashboard-banner.jpg'); background-size: cover; background-position: center;">
        <span class="mask bg-gradient-secondary opacity-8"></span>

        <div class="w-100" style="z-index: 1;">
            <h1 class="fs-2 text-white text-center">
                Hello <span class="text-dark">{{ auth()->user()->name }} 👋</span>
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Kamar</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $rooms->count() }}
                                    <span class="text-info text-sm font-weight-bolder">Kamar</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                <i class="ni ni-building text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Kamar yang Dapat Diisi</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $rooms->where('status', 'dapatDiisi')->count() }}
                                    <span class="text-success text-sm font-weight-bolder">Kamar</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                <i class="ni ni-building text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pasien</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $patients->count() }}
                                    <span class="text-info text-sm font-weight-bolder">Pasien</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pasien Dalam Antrian</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $patients->where('room_id', null)->count() }}
                                    <span class="text-success text-sm font-weight-bolder">Pasien</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <h5 class="font-weight-bolder mb-4">Segera Cek Antrian!</h5>
                                <p class="mb-5">Manajemen antrian dengan rapi dan baik tanpa effort berlebih ✨.
                                    Dasbor kami yang dapat disesuaikan memungkinkan Anda memilih metrik dan informasi mana
                                    yang paling penting bagi Anda.
                                </p>
                                <a class="text-body text-sm font-weight-bold mb-0 icon-move-right" href="/antrian">
                                    Antrian
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                            <div class="bg-gradient-info border-radius-lg h-100">
                                <img src="../assets/img/shapes/waves-white.svg"
                                    class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                    <img class="w-100 position-relative z-index-2 pt-4"
                                        src="../assets/img/illustrations/illustration-hospital.png" alt="hospital">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card h-100 p-3">
                <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
                    style="background-image: url('../assets/img/backgrounds/admin-1.png'); background-position: center;">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                        <h5 class="text-white font-weight-bolder mb-4 pt-2">Segera Cek List Kamar!</h5>
                        <p class="text-white">Manajemen Kamar dengan rapi dan baik tanpa effort berlebih 🔥.
                            Dasbor kami yang dapat disesuaikan memungkinkan Anda memilih metrik dan informasi mana
                            yang paling penting bagi Anda.</p>
                        <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/kamar">
                            Kamar
                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
