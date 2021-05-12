@extends('templates.template')
@section('title','Pemeriksa')
@section('header')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{session(0)->status}}</h6>
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
                                <h3 class="mb-0">Edit Data Pemeriksa</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('save_profile',$data_pemeriksa->id_pemeriksa)}}" method="post">
                            @csrf
                            @method("post")
                            <h6 class="heading-small text-muted mb-4">Data Pemeriksa</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-nama">Nama Pemeriksa</label>
                                            <input type="text" class="form-control" name="nama_pemeriksa"
                                                   id="input-nama" required value="{{$data_pemeriksa->nama}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4">Data User Pemeriksa</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Username Pemeriksa</label>
                                            <input type="text" class="form-control" name="username"
                                                   id="input-username" required value="{{$data_user->username}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-old-password">Old Password</label>
                                            <input type="password" class="form-control" name="old_password"
                                                   id="input-old-password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input_new_password">New Password -  <span class="text-primary"> *optional</span></label>
                                            <input type="password" class="form-control" name="new_password"
                                                   id="input_new_password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input_confirm_password">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm_password"
                                                   id="input_confirm_password">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script !src="">
        var new_password = document.getElementById("input_new_password"),
            confirm_password = document.getElementById("input_confirm_password");

        function validatePassword() {
            if (new_password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }
        new_password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
@endsection
