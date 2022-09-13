@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Tambah Admin') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">

                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf

                            <div class="card-body">

                                <div class="input-group mb-3">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                           placeholder="{{ __('Nama Lengkap') }}" required autocomplete="name"  value="{{ old('name') }}" autofocus>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('name')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"
                                           placeholder="{{ __('UserName') }}" required autocomplete="username" autofocus>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('username')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">

                                    <select id="akses" name="akses" class="form-control custom-select bg-white border-md">
                                        <option selected disabled selected disabled value="">- Silahkan Pilih Hak Akses -</option>
                                        <option value="Admin" {{(old('akses') == 'Admin') ? ' selected' : ''}}>Admin</option>
                                        <option value="Pengelola" {{(old('akses') == 'Pengelola') ? ' selected' : ''}}>Pengelola</option>

                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user-cog"></span>
                                            {{-- <span class="fas fa-gears"></span> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3" id="wisata" style="display: none;">
                                    <select name="wisata_id" class="form-control custom-select bg-white border-md">
                                        <option selected disabled selected disabled value="">- Silahkan Pilih Pemilik -</option>
                                        @foreach(wisata() as $mp)
                                        <option value="{{$mp->id}}" {{(old('wisata_id') == $mp->id) ? ' selected' : ''}}>{{$mp->nama}}</option>
                                        @endforeach
                                    </select>


                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user-cog"></span>
                                            {{-- <span class="fas fa-gears"></span> --}}
                                        </div>
                                    </div>
                                </div>


                                <div class="input-group mb-3">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                           placeholder="{{ __('Email') }}" required autocomplete="email">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                    @error('email')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>



                                <div class="input-group mb-3">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                           placeholder="{{ __('Password') }}" required autocomplete="new-password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input type="password" name="password_confirmation"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </form>
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
        $('#akses').on('change', function(e) {
            let val = $(this).val();
            if(val== 'Pengelola'){
                $('#wisata').show();

            } else{
                $('#wisata').hide();
                document.getElementById("wisata").value=null;
            }
         });
      </script>
@endsection
