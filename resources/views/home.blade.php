@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Tempat Wisata</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Tempat Wisata</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row --><!-- /.row -->
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
                            <a href="{{ route('wisata.create') }}" class="btn btn-primary float-right" ><i class="fas fa-plus-circle"></i> Tambah</a>
                            </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table class="table table-bordered" id="datatable">
                                <thead>
                                  <tr>
                                    <th style="width: 10px">NO</th>
                                    <th style="width: 200px">Image</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>

                                    <th style="width: 100px">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>

                                    @foreach($data as $data)
                                    <tr>
                                        <td class="font-weight-bold">{{$loop->iteration}}</td>

                                        <td> <img  src="{{asset($data->foto)}}" class="img-fluid img-thumbnail" alt="Attachment Image"></td>
                                        <td>{{ $data->nama }}</td>

                                        <td>{{ $data->alamat }}</td>

                                        <td class="text-center">
                                            <a href="{{route('wisata.view',$data->id)}}"class="btn btn-success"><i class="fas fa-eye"></i> Lihat</a>

                                            <a href="#" class="btn btn-danger delete"  data-id="{{$data->id}}">
                                                <i class="fas fa-trash"> </i> Hapus
                                           </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                              </table>

                        </div>

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

@if ($message = Session::get('success'))
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    toastr.success('{{ $message }}')
</script>
@endif

<script>
    $(document).ready(function(){
        $('#datatable').DataTable({});
        $('.delete').click(function(){
          var data_id = $(this).attr('data-id');
          Swal.fire({
    title: "Hapus Tempat Wisata?",
    text: "anda yakin mau menghapus surat Tempat Wisata ini ??",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus Tempat Wisata!'
}).then((result) => {
  if (result.isConfirmed) {
    var url = "{{ route('wisata.delete', 'id') }}";
    url = url.replace('id', data_id);
    window.location = url
  }
});
      });
    });
  </script>
@endsection

