@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <div class="w-25 ms-md-3 pe-md-3 d-flex align-items-center">
            <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Cari pasien berdasarkan nama">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4" style="min-height: 500px;">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Antrian Pasien</h5>
                        </div>
                        <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Pasien</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No Antrian
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Pasien
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No Rek Medis
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Durasi Rawat Inap
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
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-center text-xs font-weight-bold mb-0">1</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Romiza Zildjian</p>
                                    </td>
                                    <td class="text-center text-uppercase">
                                        <p class="text-xs font-weight-bold mb-0">01234Y23ZZZ</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">7 Hari</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            <span class="badge badge-sm bg-gradient-success">BPJS</span>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit dan lihat detail pasien">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span data-bs-toggle="tooltip" data-bs-original-title="Hapus pasien">
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="ps-4">
                                        <p class="text-center text-xs font-weight-bold mb-0">2</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Rizky Ichwanto</p>
                                    </td>
                                    <td class="text-center text-uppercase">
                                        <p class="text-xs font-weight-bold mb-0">01324Y23ZZZ</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">7 Hari</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            <span class="badge badge-sm bg-gradient-warning">Asuransi</span>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit dan lihat detail pasien">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span data-bs-toggle="tooltip" data-bs-original-title="Hapus pasien">
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="ps-4">
                                        <p class="text-center text-xs font-weight-bold mb-0">3</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Nunik Susilawati</p>
                                    </td>
                                    <td class="text-center text-uppercase">
                                        <p class="text-xs font-weight-bold mb-0">01324Y23ZZZ</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">7 Hari</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            <span class="badge badge-sm bg-gradient-info">Umum</span>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit dan lihat detail pasien">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span data-bs-toggle="tooltip" data-bs-original-title="Hapus pasien">
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="ps-4">
                                        <p class="text-center text-xs font-weight-bold mb-0">4</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Adi Galang</p>
                                    </td>
                                    <td class="text-center text-uppercase">
                                        <p class="text-xs font-weight-bold mb-0">01234Y23ZZZ</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">7 Hari</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            <span class="badge badge-sm bg-gradient-success">BPJS</span>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit dan lihat detail pasien">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span data-bs-toggle="tooltip" data-bs-original-title="Hapus pasien">
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="ps-4">
                                        <p class="text-center text-xs font-weight-bold mb-0">5</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Wahyu Dharma</p>
                                    </td>
                                    <td class="text-center text-uppercase">
                                        <p class="text-xs font-weight-bold mb-0">01324Y23ZZZ</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">7 Hari</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            <span class="badge badge-sm bg-gradient-warning">Asuransi</span>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit dan lihat detail pasien">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span data-bs-toggle="tooltip" data-bs-original-title="Hapus pasien">
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="ps-4">
                                        <p class="text-center text-xs font-weight-bold mb-0">6</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Cahyadi Krishna</p>
                                    </td>
                                    <td class="text-center text-uppercase">
                                        <p class="text-xs font-weight-bold mb-0">01324Y23ZZZ</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">7 Hari</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            <span class="badge badge-sm bg-gradient-info">Umum</span>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit dan lihat detail pasien">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span data-bs-toggle="tooltip" data-bs-original-title="Hapus pasien">
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
