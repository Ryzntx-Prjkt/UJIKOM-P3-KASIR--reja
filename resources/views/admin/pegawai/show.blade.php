@extends('layouts.master')
@section('title', 'Detail Data Pegawai')

@section('content')

<div class="container-fluid">
    <a href="{{route('pegawai.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
    <div class="card mt-3">
        <div class="card-header" >
            <a href="{{route('pegawai.edit', $data->id)}}" class="btn btn-warning"><i class="fa fa-user-edit"></i> Edit</a>
             <button id="delete-button" class="btn btn-danger delete" data-href="{{route('pegawai.destroy', $data->id)}}" data-attr="{{$data->id}}" ><i class="fa fa-trash"></i> Hapus</button>
            <form id="delete-form" action="{{ route('pegawai.destroy', $data->id) }}" method="POST" class="d-none">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger delete"><i class="fa fa-trash"></i> Hapus</button>
            </form>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label for="" class="form-label">Nama Lengkap</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-user-alt"></i></span>
                    <input type="text" name="name" id="" class="form-control" value="{{$data->name}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Nama Pengguna</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                        <input type="text" name="username" id="" class="form-control" required value="{{$data->username}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                    <input type="email" name="email" id="" class="form-control" value="{{$data->email}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="form-label">No Telp</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    <input type="number" name="no_telp" id="" class="form-control" value="{{$data->no_telp}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Level</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-users-cog"></i></span>
                    <input type="text" name="role" id="" class="form-control" value="{{$data->role}}" readonly>
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
                  title: 'Hapus Data Pegawai?',
                  text: 'Apakah anda yakin untuk menghapus data pegawai ini?',
                  icon: 'question',
                  showCancelButton: true,
                  confirmButtonText: 'Ya',
                  cancelButtonText: 'Tidak',
              }).then((result) => {
                  if(result.isConfirmed){
                      $('form').submit();

                  }
              });

          });
        });
    </script>
@endpush
