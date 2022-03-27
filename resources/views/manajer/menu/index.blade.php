@extends('layouts.master')
@section('title', 'Data Menu')
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <a href="{{route('menu.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i>Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Menu</th>
                                <th>Harga Menu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nama_menu}}</td>
                                    <td>{{$item->harga}}</td>
                                    <td>
                                        <a href="{{route('menu.show', $item->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
@endpush
