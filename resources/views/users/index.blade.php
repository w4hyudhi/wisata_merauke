@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Admin') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">



                    <div class="card card-default">
                        <div class="card-header">
                            <a href="{{ route('users.create') }}" class="btn btn-primary float-right" ><i class="fas fa-plus-circle"></i> Tambah</a>
                            </div>
                        <div class="card-body">

                            <table class="table table-bordered" id="datatable">
                                <thead>
                                    <tr>
                                        <th>UserName</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Akses</th>
                                        <th style="width: 100px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->akses }}</td>
                                        <td class="text-center">
                                            @if ( $user->akses == "admin")
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{route('users.view',$user->id)}}"class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger delete"  data-id="{{$user->id}}">
                                                    <i class="fas fa-trash"> </i>
                                               </a>
                                                </div>


                                       @endif



                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection


@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
@section('scripts')

<

<script>
    $(document).ready(function(){
        $('#datatable').DataTable({"order": [[ 0, "des" ]]});
        $('.delete').click(function(){
          var data_id = $(this).attr('data-id');
          Swal.fire({
    title: "Hapus Admin?",
    text: "anda yakin mau menghapus admin ini ??",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus Admin!'
}).then((result) => {
  if (result.isConfirmed) {
    var url = "{{ route('users.delete', 'id') }}";
    url = url.replace('id', data_id);
    window.location = url
  }
});
      });
    });
  </script>
@endsection

