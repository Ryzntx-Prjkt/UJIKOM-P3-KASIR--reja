@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$user}}</h3>

              <p>Data Pegawai</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-tie"></i>
            </div>
            <a href="{{route('pegawai.index')}}" class="small-box-footer">Info detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$transaksi}}</h3>

              <p>Transaksi</p>
            </div>
            <div class="icon">
              <i class="fa fa-cash-register"></i>
            </div>
            @if (Auth::user()->role == 'kasir')
            <a href="{{route('riwayat-transaksi.index')}}" class="small-box-footer">Info detail <i class="fas fa-arrow-circle-right"></i></a>
            @else
            <a href="{{route('laporan-transaksi.index')}}" class="small-box-footer">Info detail <i class="fas fa-arrow-circle-right"></i></a>

            @endif
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$transaksi_now}}</h3>

              <p>Transaksi Hari ini</p>
            </div>
            <div class="icon">
              <i class="fa fa-check-circle"></i>
            </div>
            @if (Auth::user()->role == 'kasir')
            <a href="{{route('riwayat-transaksi.index')}}" class="small-box-footer">Info detail <i class="fas fa-arrow-circle-right"></i></a>
            @else
            <a href="{{route('laporan-transaksi.index')}}" class="small-box-footer">Info detail <i class="fas fa-arrow-circle-right"></i></a>

            @endif
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$menu}}</h3>

              <p>Data Menu</p>
            </div>
            <div class="icon">
              <i class="fa fa-apple-alt"></i>
            </div>
            <a href="{{route('menu.index')}}" class="small-box-footer">Info detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
</div>
@endsection
