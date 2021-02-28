@extends('templates.template')
@section('title','Detail Pelanggaran')
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
                                <li class="breadcrumb-item"><a href="#">Detail Pelanggaran</a></li>
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
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col text-left">
                                <a href="{{route('data_pelanggaran')}}" class="btn btn-success">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4">Detail Pelanggaran</h6>
                            <div class="pl-lg-4">
                                @foreach($data_pelanggaran as $dpl)
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input_nama">Nama Pegawai</label>
                                                <input type="text" class="form-control" name="nama_pegawai"
                                                       id="input_nama" value="{{$dpl->nama_pegawai}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input_nama_pemeriksa">Nama
                                                    Pemeriksa</label>
                                                <input type="text" class="form-control" name="nama_pemeriksa"
                                                       id="input_nama_pemeriksa" value="{{$dpl->nama_pemeriksa}}"
                                                       disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input_kelompok_pelanggaran">Kelompok
                                                    Pelanggaran</label>
                                                <input type="text" class="form-control" name="kelompok_pelanggaran"
                                                       id="input_kelompok_pelanggaran"
                                                       value="{{$dpl->kelompok_pelanggaran}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input_nilai_akhir">Nilai
                                                    Akhir</label>
                                                <input type="text" class="form-control" name="nilai_akhir"
                                                       id="input_nilai_akhir" value="{{$dpl->nilai_akhir}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input_tingkat_hukuman">Tingkat
                                                    Hukuman</label>
                                                <input type="text" class="form-control" name="tingkat_hukuman"
                                                       id="input_tingkat_hukuman" value="{{$dpl->kategori_komplin}}"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input_hukuman">Hukuman</label>
                                                <input type="text" class="form-control" name="nama_pegawai"
                                                       id="input_hukumank" value="{{$dpl->jenis_hukuman}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    @if($dpl->kelompok_pelanggaran != 'I')
                                        <div class="dropdown-divider">

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input_faktor_utama_1">Bobot
                                                        Faktor Banyaknya jenis pelanggaran,</label>
                                                    <input type="text" class="form-control" name="faktor_utama_1"
                                                           id="input_faktor_utama_1"
                                                           value="{{$dpl->persentase_pembobotan[0]}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input_faktor_utama_2">Bobot
                                                        Faktor Frekuensi Pelanggaran yang Sama</label>
                                                    <input type="text" class="form-control" name="faktor_utama_2"
                                                           id="input_faktor_utama_2"
                                                           value="{{$dpl->persentase_pembobotan[1]}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input_faktor_utama_3">Bobot
                                                        Faktor Latar Belakang Dilakukannya Pelanggaran</label>
                                                    <input type="text" class="form-control" name="faktor_utama_3"
                                                           id="input_faktor_utama_3"
                                                           value="{{$dpl->persentase_pembobotan[2]}}" disabled>
                                                </div>
                                            </div>
                                            @if($dpl->kelompok_pelanggaran == 'III')
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label"
                                                               for="input_faktor_utama_4">Bobot
                                                            Faktor Jumlah Kerugian Pihak yang Dilayani</label>
                                                        <input type="text" class="form-control"
                                                               name="faktor_utama_4"
                                                               id="input_faktor_utama_4"
                                                               value="{{$dpl->persentase_pembobotan[3]}}" disabled>
                                                    </div>
                                                </div>
                                            @elseif($dpl->kelompok_pelanggaran == 'IV')
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label"
                                                               for="input_faktor_utama_5">Bobot
                                                            Faktor Jumlah Kerugian Negara</label>
                                                        <input type="text" class="form-control"
                                                               name="faktor_utama_4"
                                                               id="input_faktor_utama_4"
                                                               value="{{$dpl->persentase_pembobotan[3]}}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label"
                                                               for="input_faktor_utama_5">Bobot
                                                            Faktor Jumlah Uang yang Diterima Secara Tidak Sah/ Bukan
                                                            menjadi
                                                            Haknya yang Diterima</label>
                                                        <input type="text" class="form-control"
                                                               name="faktor_utama_5"
                                                               id="input_faktor_utama_5"
                                                               value="{{$dpl->persentase_pembobotan[4]}}" disabled>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
