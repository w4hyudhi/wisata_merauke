@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">UMKM</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">UMKM</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row --><!-- /.row --><!-- /.row -->
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
                            <div class="card-tools">
                                <form action="{{route('usaha.laporan')}}"  method="POST" >
                                    {{csrf_field()}}
                                    <input type="month" id="bdaymonth" name="bdaymonth"required>
                                    <Button type="submit" class="btn btn-primary"><i class="fas fa-download"></i></Button>
                                  </form>
                              </div>
                            </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table class="table table-striped projects" id="datatable">
                                <thead>
                                  <tr>
                                    <th style="width: 10px">NO</th>
                                    <th style="width: 200px">Image</th>
                                    <th>Nama</th>
                                    <th>Jenis Usaha</th>
                                    <th>Pemilik</th>
                                    <th>Lapak</th>
                                    <th>Tanggal Daftar</th>
                                    <th  style="width: 400px">Keterangan</th>
                                  </tr>
                                </thead>
                                <tbody>

                                    @foreach($data as $data)
                                    <tr>
                                        <td class="font-weight-bold">{{$loop->iteration}}</td>

                                        <td> <div class="text-center"> <img  src="{{asset($data->foto)}}" class="profile-user-img img-fluid" style="width:200px;" alt="Attachment Image"> </div></td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->jenis }}</td>
                                        <td>  <a href="{{route('pedagang.view',$data->pedagang->id)}}">{{ $data->pedagang->nama }}</a></td>
                                        <td>  <a href="{{route('wisata.view',$data->wisata->id)}}">{{ $data->wisata->nama }}</a></td>
                                        <td>{{ $data->tanggal }}</td>
                                        <td>{{ $data->keterangan }}</td>
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
    var url = "{{ route('pedagang.delete', 'id') }}";
    url = url.replace('id', data_id);
    window.location = url
  }
});
      });
    });
  </script>
@endsection

