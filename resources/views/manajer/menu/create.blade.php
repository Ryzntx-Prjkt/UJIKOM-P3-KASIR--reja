@extends('layouts.master')
@section('title', 'Tambah Data Menu')
@section('content')
    <a href="{{route('menu.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Harap isi semua kolom dibawah!</div>
            </div>
            <form action="{{route('menu.store')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="" class="form-label">Nama Menu</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-glass-cheers"></i></span>
                        <input type="text" name="nama_menu" id="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Harga Menu</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-money-bill"></i></span>
                        <input type="text" name="harga" id="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Foto Menu</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-file"></i></span>
                        <input type="file" name="foto" id="" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
            </div>
        </form>
        </div>
    </div>
@endsection
