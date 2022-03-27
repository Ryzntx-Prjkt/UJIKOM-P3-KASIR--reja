@extends('layouts.master')
@section('title', 'Entri Transaksi')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5>Daftar Menu</h5>
                    <form action="{{route('entri-transaksi.index')}}" method="get">

                        <div class="form-group col-4 col-sm-8 col-md-6">
                            <label for="" class="form-label">Pencarian</label>
                            <div class="input-group">
                                <input type="text" name="search" id="" class="form-control" placeholder="Cari Menu">
                                <span class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 g-4">
                        @foreach ($menu as $item)
                        <div class="card elevation-1 shadow-card">
                            <img src="{{Storage::url($item->foto)}}" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama_menu }}</h5>
                                <p class="card-text">{{ "Rp " . number_format($item->harga, 2, ",", "."); }}
                                </p>
                            </div>
                            <div class="card-footer">
                                {{-- <a href="{{ url('input-menu/' . $item->id) }}"
                                class="btn btn-primary">Show</a> --}}
                                <a href="" class="btn btn-primary" id="keranjang-modal"
                                    data-attr="{{route('entri-transaksi.show', $item->id)}}" data-toggle="modal"
                                    data-target="#exampleModal">Tambahkan</a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row row-cols-2 justify-content-between">
                        <h5>Keranjang</h5>
                        @if (isset($cart))
                        <div class="col-3">
                            <a href="{{route('kosongkan_keranjang')}}" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Kosongkan</a>
                        </div>
                        @endif

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Menu</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @if (isset($cart))
                            <tbody>
                                @foreach ($cart as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item['nama_menu']}}</td>
                                    <td>{{$item['qty']}}</td>
                                    <td>{{$item['harga']}}</td>
                                    <td>
                                        <a href="{{route('delete_keranjang', $item['row_id'])}}"
                                            class="btn btn-danger "><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                    </div>
                    <hr>
                    @if (isset($cart))
                    <div class="row justify-content-between">
                        @if (isset($cart))
                        <div class="col-4">
                            Jumlah: {{ count($cart) }}
                        </div>
                        <div class="col-5">

                            Total harga: {{ "Rp " . number_format($total_harga, 2, ",", "."); }}
                        </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <button type="button" id="button_transaksi" class="btn btn-primary" data-toggle="modal"
                            data-target="#pembayaranModal">Bayar Transaksi</button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Item Keranjang</h5>
            </div>
            <form action="{{route('entri_keranjang')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="text" name="id_menu" id="id_menu" class="form-control" hidden>
                    <div class="form-group">
                        <label for="" class="form-label">Nama Menu</label>
                        <input type="text" name="nama_menu" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Qty</label>
                        <input type="number" name="qty" id="qty" class="form-control" value="1" min="1">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambahkan ke keranjang</button>
                </div>
            </form>
        </div>
    </div>
</div>


@if (isset($cart))
{{-- Modal Pembayaran --}}
<div class="modal fade" id="pembayaranModal" tabindex="-1" role="dialog" aria-labelledby="pembayaranModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pembayaranModalLabel">Bayar</h5>
            </div>
            <form action="{{route('simpan_transaksi')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="form-label">Kode Invoice</label>
                        <input type="text" name="kode" id="" class="form-control" value="{{ $invoice }}"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Nama Pelanggan</label>
                        <input type="text" name="name_pelanggan" id="pelanggan_di" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Total Yang harus dibayar</label>
                        <input type="number" name="total_bayar" id="total_bayar" class="form-control" value="{{$total_harga}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Uang yang diterima</label>
                        <input type="number" name="uang_diterima" id="uang_diterima" class="form-control" >
                    </div>
                    <h4 id="kembalian">Kembalian:  </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif


@endsection

@push('addon-script')
<script>
    $(document).ready(function () {
        var harga;

        //Memanggil data menu ketika modal keranjang di tampilkan
        $('body').on('click', '#keranjang-modal', function (e) {
            e.preventDefault();
            let hrefs = $(this).attr('data-attr');
            axios.get(hrefs)
                .then(function (response) {
                    harga = response.data.harga;
                    $('#id_menu').val(response.data.id);
                    $('#nama').val(response.data.nama_menu);
                    $('#harga').val(harga);
                }).catch(function (error) {
                    console.log(error);
                });
        });

        // Menghitung Total harga pada item di keranjang ketika akan dimasukan
        $('#qty').change(function () {
            $hasil = harga * $('#qty').val();
            $('#harga').val($hasil);
        });

        // Reset Semua Kolom yang ada di dalam modal keranjang ketika ditutup
        $('#exampleModal').on('hidden.bs.modal', function (e) {
            $('#exampleModal').modal('hide');
            $('#qty').val('1');
            $('#harga').val('0');
        });

        // Menghitung uang kembalian di modal transaksi
        $('#uang_diterima').change(function() {
                var total = $('#total_bayar').val();
                var uang = $("#uang_diterima").val();
                var hasil = uang - total;
                $('#kembalian').html('Kembalian: '+hasil);
            });
    });

</script>
@endpush
