@extends('templates.template')
@section('title','Pelanggaran')
@section('header')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{session(0)->status}}</h6>
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
                        <form action="{{route('tambah_data_pelanggaran_calculate')}}" method="post">
                            @csrf
                            @method("post")
                            <h6 class="heading-small text-muted mb-4">Nilai Tambahan | <span>Tingkat Pelanggaran {{$data['tingkat_hukuman']}}</span></h6>
                            <div class="pl-lg-4">
                                <input type="hidden" name="id_pegawai" value="{{$data['id_pegawai']}}">
                                <input type="hidden" name="kelompok" value="{{$data['kelompok']}}">
                                <input type="hidden" name="frekuensi" value="{{$data['frekuensi']}}">
                                <input type="hidden" name="tingkat_hukuman" value="{{$data['tingkat_hukuman']}}">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Nilai Pokok</label>
                                            <input type="text" id="input-nilai-pokok" class="form-control" value="{{$data['nilai_pokok']}}" disabled>
                                            <input type="hidden" id="input-nilai-pokok" class="form-control" name="nilai_pokok" value="{{$data['nilai_pokok']}}">
                                        </div>
                                    </div>
                                </div>
                                @if($data['kelompok'] != "I")
                                <!-- Kelompok II (Faktor Utama)-->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Banyaknya Jenis Pelanggaran</label>
                                            <select class="form-control form-control" name="faktor_pembobotan_1">
                                                <option value="0.25">Hanya satu butir yang dilanggar (bobot 25%)</option>
                                                <option value="0.5">Terdapat dua butir yang dilanggar (bobot 50%)</option>
                                                <option value="0.75">Terdapat tiga butir yang dilanggar (bobot 75%)</option>
                                                <option value="1">Terdapat empat butir yang dilanggar (bobot 100%)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Frekuensi
                                                    Pelanggaran Sama</label>
                                                <select class="form-control form-control" name="faktor_pembobotan_2">
                                                    <option value="0.25">Hanya 1 (satu) kali melanggar pada pelanggaran
                                                        yang sama (bobot 25%)
                                                    </option>
                                                    <option value="0.5">2 (dua) kali melanggaran pada pelanggaran yang
                                                        sama (bobot 50%)
                                                    </option>
                                                    <option value="0.75">3 (tiga) kali melanggar pada pelanggaran yang
                                                        sama (bobot 75%)
                                                    </option>
                                                    <option value="1">Lebih dari 3 (tiga) kali melanggar pada
                                                        pelanggaran yang sama (bobot 100%)
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Latar Belakang
                                                    Pelanggaran</label>
                                                <select class="form-control form-control" name="faktor_pembobotan_3">
                                                    <option value="0.0">Terancam (bobot 0%)</option>
                                                <option value="0.25">Ketidaksengajaan (bobot 25%)</option>
                                                <option value="0.5">Terpaksa (bobot 50%)</option>
                                                <option value="0.75">Terbujuk yang dilakukan dengan sadar (bobot 75%)</option>
                                                <option value="1">Berinisiatif melakukan (bobot 100%)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!-- End Kelompok II-->
                                @if($data['kelompok'] == "III")
                                <!--Faktor Utama + Kelompok III-->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Jumlah Kerugian Pihak yang Dilayani</label>
                                            <select class="form-control form-control" name="faktor_pembobotan_4">
                                                <option value="0.25">Kecil (bobot 25%)</option>
                                                <option value="0.5">Sedang (bobot 50%)</option>
                                                <option value="0.75">Signifikan (bobot 75%)</option>
                                                <option value="1">Besar (bobot 100%)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Kelompok III-->
                                @elseif($data['kelompok'] == "IV")
                                <!--Faktor Utama + Kelompok IV-->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Jumlah Kerugian Negara</label>
                                            <select class="form-control form-control" name="faktor_pembobotan_4">
                                                <option value="0.0">Tidak Terdapat Kerugian Negara (bobot 0%)</option>
                                                <option value="0.25"> < Rp50 juta (bobot 25%)</option>
                                                <option value="0.5">Rp50 juta < KN ≤ Rp100 juta (bobot 50%)</option>
                                                <option value="0.75">Rp100 juta < KN ≤ Rp1 miliar (bobot 75%)</option>
                                                <option value="1">Lebih dari Rp1 miliar (bobot 100%)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Jumlah Uang yang Diterima Secara Tidak Sah</label>
                                            <select class="form-control form-control" name="faktor_pembobotan_5">
                                                <option value="0.0">0 (bobot 0%)</option>
                                                <option value="0.25">Menerima sampai dengan Rp10 juta (bobot 25%)</option>
                                                <option value="0.5">Rp10 juta < UYDSTS/BMHYD ≤ Rp50 juta (bobot 50%)</option>
                                                <option value="0.75">Rp50 juta < UYDSTS/BMHYD ≤ Rp1 miliar (bobot 75%)</option>
                                                <option value="1">Lebih dari Rp1 miliar (bobot 100%)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!-- End Kelompok IV-->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="col-12 text-right">
{{--                                                <a href="" onclick="window.history.back();"class="btn btn-sm btn-primary">Prev</a>--}}
                                                <button type="submit" class="btn btn-sm btn-primary">Next</button>
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
    </div>
@endsection
