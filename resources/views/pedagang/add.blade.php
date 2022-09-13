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
                    <li class="breadcrumb-item active">Tambah</li>
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
            <div class="card card-default">
                <form action="{{ route('pedagang.store') }}" id="verifyDocForm" class="needs-validation"  method="POST" enctype="multipart/form-data">
                    @csrf
                <!-- /.card-header -->
                <div class="card-header">
                    <h3 class="card-title">Tambah Pedagang</h3>
                  </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" id="profile" src="{{asset('images/profile.png')}}" alt="User profile picture">
                      </div>
                        <div class="form-group">
                            <label>Nama Pedagang</label>
                            <input type="text" name="nama"
                            class="form-control @error('nama') is-invalid @enderror"
                            placeholder="{{ __('Nama Pedagang') }}"
                            value="{{ old('nama') }}"
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
                            placeholder="{{ __('email') }}" value="{{ old('email') }}" required>

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
                            placeholder="{{ __('telp') }}" value="{{ old('telp') }}" pattern="[0-9]{12}" required>

                             @error('telp')
                             <span class="error invalid-feedback">
                              {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control custom-select bg-white border-md">
                                <option value="Laki-laki" {{(old('jenis_kelamin') == 'laki-laki') ? ' selected' : ''}}>Laki-Laki</option>
                                <option value="Perempuan" {{(old('jenis_kelamin') == 'perempuan') ? ' selected' : ''}}>Perempuan</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    placeholder="{{ __('Tanggal Lahir') }}" required autocomplete="tanggal_lahir" value="{{ old('tanggal_lahir')}}" autofocus>
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
                            placeholder="{{ __('File image') }}" onchange="readURL(this);" required >
                              <label class="custom-file-label" for="customFile" >{{ old('image') }}</label>
                            </div>
                            @error('image')
                            <span class="error invalid-feedback">
                           {{ $message }}
                            </span>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" rows="3" name="alamat"   @error('alamat') is-invalid @enderror placeholder="alamat ...">{{ old('alamat') }}</textarea>
                           @error('alamat')
                         <span class="error invalid-feedback">
                         {{ $message }}
                          </span>
                            @enderror
                        </div>
                      <!-- /.form-group -->

                  <!-- /.row -->
                  <!-- /.row -->
                </div>
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
                            <div class="btn-grou float-right" >
                                <button type="submit"  id="verifyDoc" name="action" class="btn btn-primary" value="simpan">
                                    <i class="fas fa-upload"></i>
                                    <span>Simpan</span>
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
    {{-- <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/bs-stepper/css/bs-stepper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/min/dropzone.min.css')}}"> --}}
@endsection

@section('scripts')
<script>
    $(function () {
      bsCustomFileInput.init();
    });
    </script>

    <script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
{{-- <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>

<script src="{{asset('assets/plugins/inputmask/jquery.inputmask.min.js')}}"></script>

<script src="{{asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script src="{{asset('assets/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<script src="{{asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script> --}}

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

{{-- <script>
    $(document).on('submit', 'form.needs-validation ',function(event){
       // var form = jQuery("#verifyDocForm");
        const form = document.querySelector('verifyDocForm')
            event.preventDefault();


          Swal.fire({
            title: "Simpan Pedagang",
                text: "Apakah Data Pedaganag Sudah Benar ?",
                icon: "info",
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus Tempat Wisata!'
}).then((result) => {
  if (result.isConfirmed) {
    form.submit();
  }
});

    });
  </script> --}}

<script>
        jQuery(document).on('submit', 'form.needs-validation ', function (event) {
            // var form = jQuery("#verifyDocForm");
            // var form = document.querySelector('verifyDocForm')
            let form = document.getElementById("verifyDocForm");

            event.preventDefault();
            Swal.fire({
                title: "Simpan Pedagang",
                text: "Apakah Data Pedaganag Sudah Benar ?",
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

</script>

@endsection
