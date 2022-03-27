@extends('layouts.master')
@section('title', 'Tambah Data Pegawai')

@section('content')

<div class="container-fluid">
    <a href="{{route('pegawai.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
    <div class="card mt-3">
        <div class="card-header">
            <h6 class="card-title">Isi Semua Kolom Dibawah!</h6>
        </div>
        <form action="{{route('pegawai.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="" class="form-label">Nama Lengkap</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-user-alt"></i></span>
                            <input type="text" name="name" id="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Nama Pengguna</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                            <input type="text" name="username" id="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                            <input type="email" name="email" id="" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="" class="form-label">Sandi</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    <input type="password" name="password" id="" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="" class="form-label">Konfirmasi Sandi</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    <input type="password" name="password_confirmation" id="" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">No Telp</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            <input type="number" name="no_telp" id="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Level</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-users-cog"></i></span>
                            <select name="role" id="" class="form-select" required>
                                <option selected>Pilih Level Pegawai</option>
                                <option value="admin">Admin</option>
                                <option value="manajer">Manajer</option>
                                <option value="kasir">Kasir</option>
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
