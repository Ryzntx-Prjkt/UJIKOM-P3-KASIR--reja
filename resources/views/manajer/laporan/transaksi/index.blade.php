@extends('layouts.master')
@section('title', 'Laporan Data Transaksi')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Filter Laporan</h5>
                <form action="{{route('laporan-transaksi.index')}}" method="get">
                    <div class="row m-0">
                        <div class="col-2">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                <input type="date" name="minDate" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                <input type="date" name="maxDate" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
                <div class="row m-0 mt-3">
                    <div class="col-3">
                        <form action="{{route('laporan-transaksi.index')}}" method="get">
                            <div class="form-group row">
                                <div class="col-8">
                                    <select name="user" id="" class="form-control">
                                        <option value="" selected>Pilih Pegawai</option>
                                        @foreach ($user as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <button class=" btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Nama Pelanggan</th>
                                <th>Total Menu</th>
                                <th>Total Pemasukan</th>
                                <th>Tanggal</th>
                                <th>Pegawai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->invoice}}</td>
                                    <td>{{$item->nama_pelanggan}}</td>
                                    <td>{{$item->total_menu}}</td>
                                    <td>{{ "Rp " . number_format($item->total_harga, 2, ",", "."); }}</td>
                                    <td>{{$item->created_at->format('d/m/Y')}}</td>
                                    <td>{{$item['user']->name}}</td>
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
            $('#table').DataTable({
                dom: 'Bfrtip',
            buttons: [
                'pdf', 'print'
            ],
            });
        });
    </script>
@endpush
