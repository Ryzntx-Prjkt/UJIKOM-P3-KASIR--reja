<script src="{{asset('')}}plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('')}}plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('')}}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('')}}plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('')}}plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('')}}plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('')}}plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('')}}plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Summernote -->
<script src="{{asset('')}}plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('')}}plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('')}}dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="dist/js/pages/dashboard.js"></script> --}}

{{-- <script src="{{ asset('plugins/popper/popper.min.js')}}"></script> --}}
{{-- <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script> --}}
{{-- <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script> --}}

<script src="{{ asset('plugins/axios/axios.min.js')}}"></script>
{{--
<script src="{{ asset('assets/vendors/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{ asset('assets/js/pages/dashboard.js')}}"></script>
<script src="{{ asset('assets/js/mazer.js')}}"></script> --}}

<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{ asset('plugins/izitoast/js/iziToast.js')}}"></script>
<script src="{{ asset('plugins/select2/dist/js/select2.js')}}"></script>
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('')}}plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script type="text/javascript" src="{{asset('plugins/datatables/JSZip-2.5.0/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/DataTables-1.11.5/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/DataTables-1.11.5/js/dataTables.bootstrap5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/Buttons-2.2.2/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/Buttons-2.2.2/js/buttons.bootstrap5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/Buttons-2.2.2/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/Buttons-2.2.2/js/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/DateTime-1.1.2/js/dataTables.dateTime.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/Responsive-2.2.9/js/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/Responsive-2.2.9/js/responsive.bootstrap5.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/Scroller-2.0.5/js/dataTables.scroller.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/SearchBuilder-1.3.2/js/dataTables.searchBuilder.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/SearchBuilder-1.3.2/js/searchBuilder.bootstrap5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/SearchPanes-2.0.0/js/dataTables.searchPanes.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/SearchPanes-2.0.0/js/searchPanes.bootstrap5.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $('.logout').click(function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin untuk keluar?',
                text: 'Yakin untuk hapus sesi ini dan keluar?',
                icon: 'question',
                confirmButtonText: 'Ya',
                  cancelButtonText: 'Tidak',
                showCancelButton: true,
            }).then((result) => {
                if(result.isConfirmed){
                    $('#logout-form').submit();
                }
            });
        });
    });
</script>
