@extends('templates.template')
@section('title','Pegawai')
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
                                <li class="breadcrumb-item"><a href="#">Data Pegawai</a></li>
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
                                <a href="{{route('tambah_data_pegawai')}}" class="btn btn- btn-default">Tambah Data Pegawai</a>
                            </div>
                        </div>
                    </div>

                    <!-- Light table -->
                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush" id="datatable-buttons">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($data_pegawai as $dpg)
                                <tr>
                                    <td class="budget">{{$loop->index+1}}</td>
                                    <td>{{$dpg->nama}}</td>
                                    <td>{{$dpg->jabatan}}</td>
                                    <td>
                                        <a href="{{route('edit_data_pegawai',$dpg->id_pegawai)}}"
                                           type="button" class="btn-sm btn-light">Edit</a>
                                        <a href="{{route('hapus_data_pegawai',$dpg->id_pegawai)}}"
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
