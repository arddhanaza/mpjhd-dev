@extends('templates.template')
@section('title','Pelanggaran')
@section('header')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Pemeriksa</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="data pelanggaran.html">Data Pelanggaran</a></li>
                                <li class="breadcrumb-item"><a href="#">Input Pelanggaran</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Input Pelanggaran </h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4">Nilai Tambahan</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Nilai Pokok</label>
                                            <input type="text" id="input-nilai-pokok" class="form-control" placeholder="30" disabled>
                                        </div>
                                    </div>
                                </div>
                                <!-- Kelompok I -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Jumlah Hari</label>
                                            <input type="number" id="input-hari" class="form-control" placeholder="Jumlah Hari">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Kelompok I -->
                                <!-- Kelompok II (Faktor Utama)-->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Banyaknya Jenis Pelanggaran</label>
                                            <select class="form-control form-control">
                                                <option>Hanya satu butir yang dilanggar (bobot 25%)</option>
                                                <option>Terdapat dua butir yang dilanggar (bobot 50%)</option>
                                                <option>Terdapat tiga butir yang dilanggar (bobot 75%)</option>
                                                <option>Terdapat empat butir yang dilanggar (bobot 100%)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Frekuensi Pelanggaran Sama</label>
                                            <select class="form-control form-control">
                                                <option>Hanya 1 (satu) kali melanggar pada pelanggaran yang sama (bobot 25%)</option>
                                                <option>Terdapat 2 (dua) butir yang dilanggar (bobot 50%)</option>
                                                <option>Terdapat 3 (tiga) butir yang dilanggar (bobot 75%)</option>
                                                <option>Terdapat 4 (empat) butir yang dilanggar (bobot 100%)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Latar Belakang Pelanggaran</label>
                                            <select class="form-control form-control">
                                                <option>Terancam (bobot 0%)</option>
                                                <option>Ketidaksengajaan (bobot 25%)</option>
                                                <option>Terpaksa (bobot 50%)</option>
                                                <option>Terbujuk yang dilakukan dengan sadar (bobot 75%)</option>
                                                <option>Berinisiatif melakukan (bobot 100%)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Kelompok II-->
                                <!--Faktor Utama + Kelompok III-->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Jumlah Kerugian Pihak yang Dilayani</label>
                                            <select class="form-control form-control">
                                                <option>Kecil (bobot 25%)</option>
                                                <option>Sedang (bobot 50%)</option>
                                                <option>Signifikan (bobot 75%)</option>
                                                <option>Besar (bobot 100%)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Kelompok III-->
                                <!--Faktor Utama + Kelompok IV-->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Jumlah Kerugian Negara</label>
                                            <select class="form-control form-control">
                                                <option>Tidak Terdapat Kerugian Negara (bobot 0%)</option>
                                                <option> < Rp50 juta (bobot 25%)</option>
                                                <option>Rp50 juta < KN ≤ Rp100 juta (bobot 50%)</option>
                                                <option>Rp100 juta < KN ≤ Rp1 miliar (bobot 75%)</option>
                                                <option>Lebih dari Rp1 miliar (bobot 100%)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Jumlah Uang yang Diterima Secara Tidak Sah</label>
                                            <select class="form-control form-control">
                                                <option>0 (bobot 0%)</option>
                                                <option>Menerima sampai dengan Rp10 juta (bobot 25%)</option>
                                                <option>Rp10 juta < UYDSTS/BMHYD ≤ Rp50 juta (bobot 50%)</option>
                                                <option>Rp50 juta < UYDSTS/BMHYD ≤ Rp1 miliar (bobot 75%)</option>
                                                <option>Lebih dari Rp1 miliar (bobot 100%)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Kelompok IV-->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="col-12 text-right">
                                                <a href="tambah pelanggaran 2.html" class="btn btn-sm btn-primary">Prev</a>
                                                <a href="{{route('tambah_data_pelanggaran_calculate')}}" class="btn btn-sm btn-primary">Next</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
