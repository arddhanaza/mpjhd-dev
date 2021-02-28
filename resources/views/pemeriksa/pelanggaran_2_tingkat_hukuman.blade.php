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
                                <h3 class="mb-0">Input Pelanggaran</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('tambah_data_pelanggaran_faktor_utama')}}" method="post">
                            @csrf
                            @method("post")
                            <input type="hidden" name="id_pegawai" value="{{$data['id_pegawai']}}">
                            <input type="hidden" name="kelompok" value="{{$data['kelompok']}}">
                            <h6 class="heading-small text-muted mb-4">Tingkat Hukuman</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    @if($data['kelompok'] == "I")
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-frekuensi">Lama tidak
                                                    Masuk</label>
                                                <input type="number" class="form-control" name="frekuensi_tidak_masuk"
                                                       id="input-frekuensi" min="1" required>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-hukuman">Tingkat
                                                    Hukuman</label>
                                                <select class="form-control form-control" name="tingkat_hukuman"
                                                        id="input-hukuman" required>
                                                    <option value="Ringan">Ringan</option>
                                                    <option value="Sedang">Sedang</option>
                                                    <option value="Berat">Berat</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="col-12 text-right">
{{--                                                <a href="" onclick="window.history.back();"--}}
{{--                                                   class="btn btn-sm btn-primary">Prev</a>--}}
                                                <button class="btn btn-sm btn-primary" type="submit">Next</button>
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
