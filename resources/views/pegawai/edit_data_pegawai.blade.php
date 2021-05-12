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
                                <li class="breadcrumb-item"><a href="{{route('data_pegawai')}}">Data Pegawai</a></li>
                                <li class="breadcrumb-item"><a href="#">Edit Data Pegawai</a></li>
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
                                <h3 class="mb-0">Input Data Pegawai</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update_data_pegawai',$data_pegawai->id_pegawai)}}" method="post">
                            @csrf
                            @method("post")
                            <h6 class="heading-small text-muted mb-4">Data Pegawai</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-nama">Nama Pegawai</label>
                                            <input type="text" class="form-control" name="nama_pegawai"
                                                   id="input-nama" required value="{{$data_pegawai->nama}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-jabatan">Jabatan</label>
                                            <select class="form-control form-control" name="jabatan"
                                                    id="input-jabatan" required>
                                                @foreach($data_jabatan as $jabatan)
                                                    <option
                                                        value="{{$jabatan->id_jabatan}}"
                                                        @if($data_pegawai->id_jabatan == $jabatan->id_jabatan)
                                                        selected
                                                        @endif>{{$jabatan->jabatan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="col-12 text-right">
                                                <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4">Data User Pegawai</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span class="text-warning">*Data User akan digenerate secara otomatis dengan default username namalengkap dan password root</span>
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
