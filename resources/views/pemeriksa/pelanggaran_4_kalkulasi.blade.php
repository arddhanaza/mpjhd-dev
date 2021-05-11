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
                                <li class="breadcrumb-item"><a href="{{route('data_pelanggaran')}}">Data Pelanggaran</a></li>
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
                        <form action="{{route('save_all_data')}}" method="post">
                            @csrf
                            @method('post')
                            <h6 class="heading-small text-muted mb-4">Nilai Akhir</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Nama Pegawai</label>
                                            <input type="text" id="input-username" class="form-control"
                                                   value="{{$data['id_pegawai']}}" disabled>
                                            <input type="hidden" id="input-username" class="form-control"
                                                   name="id_pegawai"
                                                   value="{{$data['id_pegawai']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Nilai Pokok</label>
                                            <input type="text" id="input-username" class="form-control"
                                                   value="{{$data['nilai_pokok']}}" disabled>
                                            <input type="hidden" id="input-username" class="form-control"
                                                   value="{{$data['nilai_pokok']}}" name="nilai_pokok">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Nilai
                                                Tambahan</label>
                                            <input type="text" id="input-username" class="form-control"
                                                   value="{{$data['nilai_tambahan']}}" disabled>
                                            <input type="hidden" id="input-username" class="form-control"
                                                   value="{{$data['nilai_tambahan']}}" name="nilai_tambahan">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Nilai Akhir</label>
                                            <input type="text" id="input-username" class="form-control"
                                                   value="{{$data['nilai_akhir']}}" disabled>
                                            <input type="hidden" id="input-username" class="form-control"
                                                   value="{{$data['nilai_akhir']}}" name="nilai_akhir">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="input-username" class="form-control"
                                       value="{{$data['kelompok']}}" name="kelompok">

                                @if($data['kelompok'] != 'I')
                                    @if(!isset($data['faktor_4']) && !isset($data['faktor_5']))
                                        <input type="hidden" name="faktor"
                                               value="[{{$data['faktor_1']}},{{$data['faktor_2']}},{{$data['faktor_3']}}]">
                                    @endif
                                    @if(isset($data['faktor_5']))
                                        <input type="hidden" name="faktor"
                                               value="[{{$data['faktor_1']}},{{$data['faktor_2']}},{{$data['faktor_3']}},{{$data['faktor_4']}},{{$data['faktor_5']}}]">
                                    @endif
                                    @if(!isset($data['faktor_5']) && isset($data['faktor_4']))
                                        <input type="hidden" name="faktor"
                                               value="[{{$data['faktor_1']}},{{$data['faktor_2']}},{{$data['faktor_3']}},{{$data['faktor_4']}}]">
                                    @endif
                                @endif
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="col-12 text-right">
{{--                                                <a href="" onclick="window.history.back();"--}}
{{--                                                   class="btn btn-sm btn-primary">Prev</a>--}}
                                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
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
