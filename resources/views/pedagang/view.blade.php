@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Pedagang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('pedagang.index') }}">Pedagang</a></li>
                    <li class="breadcrumb-item active">Ubah</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row --><!-- /.row --><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card {{($pedagang->status == 'verifikasi') ? 'card-success' : 'card-danger'}} ">
                        <div class="card-header">
                            <h3 class="card-title"><i class="icon mr-2 {{($pedagang->status == 'verifikasi') ? 'fas fa-check' : 'fas fa-ban'}}"></i>{{$pedagang->nama}} ({{\Carbon\Carbon::parse($pedagang->tanggal_lahir)->age}} Tahun)</h3>
                          </div>
                <form action="{{ route('pedagang.update',$pedagang->id) }}" class="needs-validation" id="verifyDocForm" method="POST" enctype="multipart/form-data">
                    @csrf

                <div class="card-body">

                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" id="profile"  src="{{asset($pedagang->foto)}}" style="width:100px;height:100px;" alt="User profile picture">
                      </div>
                        <div class="form-group">
                            <label>Nama Pedagang</label>
                            <input type="text" name="nama"
                            class="form-control @error('nama') is-invalid @enderror"
                            placeholder="{{ __('Nama Pedagang') }}"
                            value="{{ old('nama',$pedagang->nama) }}"
                            required>

                            @error('nama')
                             <span class="error invalid-feedback">
                                {{ $message }}
                             </span>
                            @enderror
                        </div>
                           <!-- /.form-group -->
                           <div class="form-group">
                            <label>E-Mail</label>
                            <input type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="{{ __('email') }}" value="{{ old('email',$pedagang->email) }}" required>

                             @error('email')
                             <span class="error invalid-feedback">
                              {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nomer HP</label>
                            <input type="tel" name="telp"
                            class="form-control @error('telp') is-invalid @enderror"
                            placeholder="{{ __('telp') }}" value="{{ old('telp',$pedagang->telp) }}" pattern="[0-9]{12}" required>

                             @error('telp')
                             <span class="error invalid-feedback">
                              {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control custom-select bg-white border-md">
                                <option value="Laki-laki" {{(old('jenis_kelamin',$pedagang->jenis_kelamin) == 'laki-laki') ? ' selected' : ''}}>Laki-Laki</option>
                                <option value="Perempuan" {{(old('jenis_kelamin',$pedagang->jenis_kelamin) == 'perempuan') ? ' selected' : ''}}>Perempuan</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    placeholder="{{ __('Tanggal Lahir') }}" required autocomplete="tanggal_lahir" value="{{ old('tanggal_lahir',$pedagang->tanggal_lahir)}}" autofocus>
                             @error('tanggal')
                             <span class="error invalid-feedback">
                              {{ $message }}
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Foto</label>
                            <div class="custom-file">
                            <input type="file" name="image"
                            class="custom-file-input @error('image') is-invalid @enderror"
                            id="customFile" accept=" image/jpeg, image/png"
                            placeholder="{{ __('File image') }}" onchange="readURL(this);" >
                              <label class="custom-file-label" for="customFile" >{{ old('image',$pedagang->foto) }}</label>
                            </div>
                            @error('image')
                            <span class="error invalid-feedback">
                           {{ $message }}
                            </span>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" rows="3" name="alamat"   @error('alamat') is-invalid @enderror placeholder="alamat ...">{{ old('alamat',$pedagang->alamat) }}</textarea>
                           @error('alamat')
                         <span class="error invalid-feedback">
                         {{ $message }}
                          </span>
                            @enderror
                        </div>
                      <!-- /.form-group -->

                  <!-- /.row -->
                  <!-- /.row -->


                <!-- /.card-body -->
                <div class="card-footer">
                    <div id="actions" class="row">
                        <div class="col-lg-6 d-flex align-items-center">
                          <div class="fileupload-process w-100">
                            <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                              <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress=""></div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="btn-group float-right" >
                                @if ($pedagang->status != 'verifikasi')
                                <button type="submit" name="action" class="btn btn-success verifyDoc" value="setuju">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Verifikasi</span>
                                </button>

                                @endif
                                <button type="submit" name="action" class="btn btn-primary" value="simpan">
                                    <i class="fas fa-upload"></i>
                                    <span>Update</span>
                                </button>


                            </div>
                        </div>
                      </div>
                </div>
            </form>
              </div>

            </div>
        </div>
        </div>
      </section>
    <!-- /.content -->
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

@endsection

@section('scripts')
<script>
    $(function () {
      bsCustomFileInput.init();
    });
    </script>

    <script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

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
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#profile').attr('src', e.target.result).width(100).height(100);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>

<script>
      $(document).ready(function(){
   $('.verifyDoc').click(function() {
        // var form = jQuery("#verifyDocForm");
        // var form = document.querySelector('verifyDocForm')
        let form = document.getElementById("verifyDocForm");

        event.preventDefault();
        Swal.fire({
            title: "Verifikasi Pedagang",
            text: "Apakah Anda Yakin Mau Memverifikasi Pedagang ?",
            icon: "info",
            showCancelButton: true,
            buttonsStyling: true,
            confirmButtonText: "ok",
            cancelButtonText: "cancel"
        }).then((result) => {
     if (result.isConfirmed) {
        form.submit();
}
});

    });
});

</script>
@endsection
