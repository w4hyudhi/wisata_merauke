@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('About us') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container text-center">
        <h3 class="profile-username ">APLIKASI SISTEM PENGELOLA TEMPAT WISATA DAN
            PEDAGANG KAKI LIMA DI KAB. MERAUKE
            <br>IRENE BLOREP KLASIS MERAUKE</h3>
        <div class="cover-photo mt-4">
          <img src="{{ asset('images/logo.png') }} " style="width:300px;" class="profile">
        </div>




        {{-- <button class="msg-btn">Message</button>
        <button class="follow-btn">Following</button> --}}

      </div>
    <!-- /.content -->
@endsection
