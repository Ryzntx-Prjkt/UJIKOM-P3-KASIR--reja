@extends('layouts.master')
@section('title', 'Detail Menu')
@section('content')
    <a href="{{route('menu.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
                <a href="{{route('menu.edit', $data->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit Data</a>
                <a href="" class="btn btn-danger delete"><i class="fa fa-trash"></i> Hapus Data</a>
                <form id="delete-form" action="{{ route('menu.destroy', $data->id) }}" method="POST" class="d-none">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger delete"><i class="fa fa-trash"></i> Hapus</button>
                </form>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <img src="{{Storage::url($data->foto)}}" alt="" class="img-thumbnail" width="20%">
                    <div class="form-group">
                        <label for="" class="form-label">Nama Menu</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-glass-cheers"></i></span>
                            <input type="text" name="nama_menu" id="" class="form-control" readonly value="{{$data->nama_menu}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Harga Menu</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-money-bill"></i></span>
                            <input type="text" name="harga" id="" class="form-control" readonly value="{{$data->harga}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script type="text/javascript">
         $(document).ready(function () {
             var id;

          $('.delete').click(function (e) {
              e.preventDefault();
              Swal.fire({
                  title: 'Hapus Data Menu?',
                  text: 'Apakah anda yakin untuk menghapus data menu ini?',
                  icon: 'question',
                  showCancelButton: true,
                  confirmButtonText: 'Ya',
                  cancelButtonText: 'Tidak',
              }).then((result) => {
                  if(result.isConfirmed){
                      $('form').submit();

                  } else {

                  }
              });

          });
        });
    </script>
@endpush
