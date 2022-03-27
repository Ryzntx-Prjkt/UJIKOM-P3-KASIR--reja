@extends('layouts.master')
@section('title', 'Edit data menu')
@section('content')
    <a href="{{route('menu.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
    <div class="container-fluid mt-3">
        <div class="card">
            <form action="{{route('menu.update', $data->id)}}" method="post" enctype="multipart/form-data" >
                @method('put')
                @csrf
            <div class="card-body">
                <img src="{{Storage::url($data->foto)}}" alt="" class="" width="15%">
                <div class="form-group">
                    <label for="" class="form-label">Nama Menu</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-glass-cheers"></i></span>
                        <input type="text" name="nama_menu" id="" class="form-control" required value="{{$data->nama_menu}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Harga Menu</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-money-bill"></i></span>
                        <input type="text" name="harga" id="" class="form-control" required value="{{$data->harga}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Foto Menu</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-file"></i></span>
                        <input type="file" name="foto" id="" class="form-control" >
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
