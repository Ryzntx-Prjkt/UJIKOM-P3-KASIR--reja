@extends('layouts.master')
@section('title', 'Laporan Pendapatan')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Filter Pendapatan</h5>
            <form action="{{route('laporan-pendapatan.index')}}" method="get">
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
        </div>
        <div class="card-body">
            <h4>Total Pendapatan: {{ "Rp " . number_format($sum, 2, ",", "."); }}</h4>
            <div class="table-responsive">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice</th>
                            <th>Total Pemasukan</th>
                            <th>Tanggal</th>
                            <th>Pegawai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->invoice}}</td>
                            <td>{{ "Rp " . number_format($item->total_harga, 2, ",", "."); }}</td>
                            <td>{{$item->created_at}}</td>
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
