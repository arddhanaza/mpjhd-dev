@extends('templates.template')
@section('title','Pelanggaran')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
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
                        <form action="{{route('tambah_data_pelanggaran_tingkat_hukuman')}}" method="post">
                            @csrf
                            @method("post")
                            <h6 class="heading-small text-muted mb-4">Kelompok Hukuman</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Nama Pegawai</label>
                                            <select id="input-username" class="cari_pegawai form-control" placeholder="Nama Pegawai" name="id_pegawai" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-kelompok">Kelompok Hukuman</label>
                                            <select class="form-control form-control" name="kelompok" id="input-kelompok" required>
                                                <option value="I">Kelompok I (Satu)</option>
                                                <option value="II">Kelompok II (Dua)</option>
                                                <option value="III">Kelompok III (Tiga)</option>
                                                <option value="IV">Kelompok IV (Empat)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="col-12 text-right">
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
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script !src="">
        $('.cari_pegawai').select2({
            placeholder: 'Cari..',
            ajax:{
                url: '/data_pelanggaran/tambah/1/cari',
                dataType :'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.nama,
                                id: item.id_pegawai
                            }
                        })
                    };
                },
                cache:true
            }
        });
    </script>
@endsection
