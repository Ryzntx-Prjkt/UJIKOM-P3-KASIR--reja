@extends('layouts.master')
@section('title', 'Riwayat Transaksi')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Table Transaksi</h5>
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
                            <th>Total Bayar</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->invoice}}</td>
                            <td>{{$item->nama_pelanggan}}</td>
                            <td>{{$item->total_menu}}</td>
                            <td>{{$item->total_harga}}</td>
                            <td>{{$item->created_at->format('d/m/Y')}}</td>
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
    //fungsi untuk filtering data berdasarkan tanggal
    var start_date;
    var end_date;
    var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
        var dateStart = parseDateValue(start_date);
        var dateEnd = parseDateValue(end_date);
        //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
        //nama depan = 0
        //nama belakang = 1
        //tanggal terdaftar =2
        var evalDate = parseDateValue(aData[5]);
        if ((isNaN(dateStart) && isNaN(dateEnd)) ||
            (isNaN(dateStart) && evalDate <= dateEnd) ||
            (dateStart <= evalDate && isNaN(dateEnd)) ||
            (dateStart <= evalDate && evalDate <= dateEnd)) {
            return true;
        }
        return false;
    });

    // fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
    function parseDateValue(rawDate) {
        var dateArray = rawDate.split("/");
        var parsedDate = new Date(dateArray[2], parseInt(dateArray[1]) - 1, dateArray[
            0]); // -1 because months are from 0 to 11
        return parsedDate;
    }
    $(document).ready(function () {
        var $dTable = $('#table').DataTable({
                "language": {
                "sZeroRecords": "Tidak Ada Data"
            },
            "dom": "<'row'<'col-sm-4'l><'col-sm-5' <'datesearchbox'>><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
        });

        //menambahkan daterangepicker di dalam datatables
        $("div.datesearchbox").html(
            ' <div class="col-5"><div class="input-group"> <span class="input-group-text"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" id="datesearch" placeholder="Cari berdasarkan tanggal.."> </div></div>'
        );

        document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";

        //konfigurasi daterangepicker pada input dengan id datesearch
        $('#datesearch').daterangepicker({
            autoUpdateInput: false
        });

        //menangani proses saat apply date range
        $('#datesearch').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format(
                'DD/MM/YYYY'));
            start_date = picker.startDate.format('DD/MM/YYYY');
            end_date = picker.endDate.format('DD/MM/YYYY');
            $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
            $dTable.draw();
        });

        $('#datesearch').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
            start_date = '';
            end_date = '';
            $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
            $dTable.draw();
        });

        // $('#table').DataTable({
        //     "ordering": true,
        //     "lengthChange": true,
        //     "searching": true,
        //     "info": true,
        //     "paging": true,
        //     "scrollCollapse": true,
        //     "language": {
        //         "emptyTable": "Tidak Ada Data"
        //     }
        // });
    });

</script>
@endpush
