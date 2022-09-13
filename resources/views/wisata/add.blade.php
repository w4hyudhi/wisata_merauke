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
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Tempat Wisata</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row --><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content" data-select2-id="194">
        <div class="container-fluid" data-select2-id="32">
            <div class="card card-default">
                <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="text-center">
                        <img  src="{{asset('images/wisata.png')}}" id="image" class="img-fluid img-thumbnail my-4" style="width:500px;height:300px;" alt="Attachment Image">
                    </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Tempat Wisata</label>
                            <input type="text" name="nama"
                            class="form-control @error('nama') is-invalid @enderror"
                            placeholder="{{ __('Nama Tempat wisata') }}"
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
                            <label>Jadwal buka</label>
                            <input type="text" name="jadwal"
                            class="form-control @error('jadwal buka') is-invalid @enderror"
                            placeholder="{{ __('jadwal buka') }}" value="{{ old('jadwal') }}" required>

                             @error('jadwal')
                             <span class="error invalid-feedback">
                              {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga"
                            class="form-control @error('harga') is-invalid @enderror"
                            placeholder="{{ __('harga') }}" value="{{ old('harga') }}" required>

                             @error('harga')
                             <span class="error invalid-feedback">
                              {{ $message }}
                            </span>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat"
                            class="form-control @error('alamat') is-invalid @enderror "
                            placeholder="{{ __('alamat') }}"  value="{{ old('prihal') }}" required>
                            @error('alamat')
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Latitude Tempat Wisata</label>
                            <input type="number" name="latitude" step=any
                            class="form-control @error('latitude') is-invalid @enderror"
                            placeholder="{{ __('latitude lokasi') }}" value="{{ old('latitude')}}" required>
                             @error('latitude')
                             <span class="error invalid-feedback">
                              {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>longitude Tempat Wisata</label>
                            <input type="number" name="longitude" step=any
                            class="form-control @error('longitude') is-invalid @enderror"
                            placeholder="{{ __('longitude lokasi') }}" value="{{ old('longitude')}}" required>
                             @error('longitude')
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
                            id="customFile"
                            placeholder="{{ __('File image') }}" onchange="readURL(this);" required>
                              <label class="custom-file-label" for="customFile" >{{ old('image') }}</label>
                            </div>
                            @error('image')
                            <span class="error invalid-feedback">
                           {{ $message }}
                            </span>
                            @enderror
                          </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" rows="5" name="keterangan"   @error('isi') is-invalid @enderror placeholder="keterangan ...">{{ old('keterangan') }}</textarea>
                           @error('keterangan')
                         <span class="error invalid-feedback">
                         {{ $message }}
                          </span>
                            @enderror
                        </div>
                          <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    <!-- /.col -->
                  </div>
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
                                <button type="submit" name="action" class="btn btn-primary" value="simpan">
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
      $('#image').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endsection
