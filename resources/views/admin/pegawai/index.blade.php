@extends('layouts.master')
@section('title', 'Data Pegawai')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <a href="{{route('pegawai.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Identitas</th>
                            <th>Role</th>
                            <th>No Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <div class="row-cols-1">
                                    <h6>{{$item->name}}</h6>
                                    <p>{{$item->email}}</p>
                                </div>
                            </td>
                            <td>{{$item->role}}</td>
                            <td>{{$item->no_telp}}</td>
                            <td>
                                <a href="{{route('pegawai.show', $item->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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
