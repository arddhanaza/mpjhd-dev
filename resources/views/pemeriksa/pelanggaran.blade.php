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
                                <li class="breadcrumb-item"><a href="#">Data Pelanggaran</a></li>
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
                                <a href="{{route('tambah_data_pelanggaran_kelompok')}}" class="btn btn- btn-default">Tambah Pelanggaran</a>
                            </div>
{{--                            <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">--}}
{{--                                <div class="form-group mb-0">--}}
{{--                                    <div class="input-group input-group-alternative input-group-merge">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text"><i class="fas fa-search"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input class="form-control" placeholder="Search" type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <button type="button" class="close" data-action="search-close"--}}
{{--                                        data-target="#navbar-search-main" aria-label="Close">--}}
{{--                                    <span aria-hidden="true">×</span>--}}
{{--                                </button>--}}
{{--                            </form>--}}
                        </div>
                    </div>

                    <!-- Light table -->
                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush" id="datatable-buttons">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Nama Pemeriksa</th>
                                <th scope="col">Kelompok Pelanggaran</th>
                                <th scope="col">Nilai Akhir</th>
                                <th scope="col">Tingkat Hukuman</th>
                                <th scope="col">Hukuman</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($data_pelanggaran as $dpl)
                                <tr>
                                    <td class="budget">{{$loop->index+1}}</td>
                                    <td>{{$dpl->nama_pegawai}}</td>
                                    <td>{{$dpl->nama_pemeriksa}}</td>
                                    <td>{{$dpl->kelompok_pelanggaran}}</td>
                                    <td>{{$dpl->nilai_akhir}}</td>
                                    <td>{{$dpl->kategori_komplin}}</td>
                                    <td>{{$dpl->jenis_hukuman}}</td>
                                    <td>{{$dpl->tanggal_pencatatan}}</td>
                                    <td>
                                        <a href="{{route('lihat_detail_pelanggaran',$dpl->id_pelanggaran)}}"
                                           type="button" class="btn-sm btn-light">Detail</a>
                                        <a href="{{route('delete_pelanggaran',$dpl->id_pelanggaran)}}"
                                           onclick="return confirm('Apakah Anda Yakin?')" type="button"
                                           class="btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
