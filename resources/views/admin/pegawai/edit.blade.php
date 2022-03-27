@extends('layouts.master')
@section('title', 'Edit Data Pegawai')
@section('content')
    <div class="container-fluid">
        <a href="{{route('pegawai.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        <div class="card mt-3">
            <form action="{{route('pegawai.update', $data->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="form-label">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user-alt"></i></span>
                                <input type="text" name="name" id="" class="form-control" required value="{{$data->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Nama Pengguna</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                                <input type="text" name="username" id="" class="form-control" required value="{{$data->username}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                <input type="email" name="email" id="" class="form-control" required value="{{$data->email}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="form-label">Sandi</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                        <input type="password" name="password" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="form-label">Konfirmasi Sandi</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                        <input type="password" name="password_confirmation" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">No Telp</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                <input type="number" name="no_telp" id="" class="form-control" required value="{{$data->no_telp}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Level</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-users-cog"></i></span>
                                <select name="role" id="" class="form-select" required>
                                    <option selected>Pilih Level Pegawai</option>

                                    <option @if ($data->role == 'admin') selected @endif value="admin" selected>Admin</option>
                                    <option @if ($data->role == 'manajer') selected @endif value="manajer">Manajer</option>
                                    <option @if ($data->role == 'kasir') selected @endif value="kasir">Kasir</option>


                                </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success"><i class="fa fa-save"></i> Simpan data</button>
                </div>
            </form>
        </div>
    </div>
@endsection
