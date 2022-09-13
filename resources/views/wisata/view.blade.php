@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Kelola Tempat Wisata') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">Tempat Wisata</a></li>
                      <li class="breadcrumb-item active">{{$wisata->nama}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">

            <div class="col-md-6">
                <div class="card card-default">
                    <form action="{{ route('wisata.update',$wisata->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="text-center">
                            <img  src="{{asset($wisata->foto)}}" id="image" class="img-fluid img-thumbnail my-4" style="width:500px;height:300px;" alt="Attachment Image">
                        </div>


                            <div class="form-group">
                                <label>Nama Tempat Wisata</label>
                                <input type="text" name="nama"
                                class="form-control @error('nama') is-invalid @enderror"
                                placeholder="{{ __('Nama Tempat wisata') }}"
                                value="{{ old('nama',$wisata->nama) }}"
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
                                placeholder="{{ __('jadwal buka') }}" value="{{ old('jadwal',$wisata->jadwal) }}" required>

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
                                placeholder="{{ __('harga') }}" value="{{ old('harga',$wisata->harga) }}" required>

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
                                placeholder="{{ __('alamat') }}"  value="{{ old('alamat',$wisata->alamat) }}" required>
                                @error('alamat')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Latitude Tempat Wisata</label>
                                <input type="number" name="latitude" step=any
                                class="form-control @error('latitude') is-invalid @enderror"
                                placeholder="{{ __('latitude lokasi') }}" value="{{ old('latitude',$wisata->latitude)}}" required>
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
                                placeholder="{{ __('longitude lokasi') }}" value="{{ old('longitude',$wisata->longitude)}}" required>
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
                                placeholder="{{ __('File image') }}" onchange="readURL(this);">
                                  <label class="custom-file-label" for="customFile" >{{ old('image',$wisata->foto) }}</label>
                                </div>
                                @error('image')
                                <span class="error invalid-feedback">
                               {{ $message }}
                                </span>
                                @enderror
                              </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" rows="5" name="keterangan"   @error('isi') is-invalid @enderror placeholder="keterangan ...">{{ old('keterangan',$wisata->keterangan) }}</textarea>
                               @error('keterangan')
                             <span class="error invalid-feedback">
                             {{ $message }}
                              </span>
                                @enderror
                            </div>
                          <!-- /.form-group -->

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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Fasilitas Wisata</h3>
                      <div class="card-tools">
                        <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus-circle"></i></a>
                      </div>

                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered" id="datatable">
                            <thead>
                              <tr>
                                <th style="width: 10px">NO</th>
                                <th style="width: 100px">Image</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Tahun</th>

                                <th  style="width: 50px">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>

                                @foreach($wisata->fasilitas as $fasilitas)
                                <tr>
                                    <td class="font-weight-bold">{{$loop->iteration}}</td>

                                    <td> <img  src="{{asset($fasilitas->foto)}}" class="img-fluid img-thumbnail" alt="Attachment Image"></td>
                                    <td>{{ $fasilitas->nama }}</td>
                                    <td>{{ $fasilitas->jenis }}</td>
                                    <td>{{ $fasilitas->tahun }}</td>

                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#"class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-fasilitas{{$fasilitas->id}}"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger delete"  data-id="{{$fasilitas->id}}"><i class="fas fa-trash"></i></a>
                                        </div>


                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-lg-fasilitas{{$fasilitas->id}}">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Tambah Fasilitas</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>

                                        <form action="{{ route('fasilitas.update',$fasilitas->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <!-- /.card-header -->
                                        <div class="modal-body">

                                            <div class="text-center">
                                                <img  src="{{asset($fasilitas->foto)}}" id="image_fasilitas{{$fasilitas->id}}" class="img-fluid img-thumbnail my-4" style="width:300px;height:150px;" alt="Attachment Image">
                                            </div>

                                                <div class="form-group">
                                                    <label>Nama Fasilitas</label>
                                                    <input type="text" name="nama"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    placeholder="{{ __('Nama Fasilitas') }}"
                                                    value="{{ old('nama',$fasilitas->nama) }}"
                                                    required>

                                                    @error('nama')
                                                     <span class="error invalid-feedback">
                                                        {{ $message }}
                                                     </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Jenis Fasilitas</label>
                                                    <input type="text" name="jenis"
                                                    class="form-control @error('jenis') is-invalid @enderror"
                                                    placeholder="{{ __('Jenis Fasilitas') }}" value="{{ old('jenis',$fasilitas->jenis) }}" required>

                                                     @error('jenis')
                                                     <span class="error invalid-feedback">
                                                      {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Tahun</label>
                                                    <input type="text" name="tahun"
                                                    class="form-control @error('tahun') is-invalid @enderror"
                                                    placeholder="{{ __('tahun') }}" value="{{ old('tahun',$fasilitas->tahun) }}" required>

                                                     @error('tahun')
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
                                                    placeholder="{{ __('File image') }}" onchange="document.getElementById('image_fasilitas{{$fasilitas->id}}').src = window.URL.createObjectURL(this.files[0])">
                                                      <label class="custom-file-label" for="customFile" >{{ old('image',$fasilitas->foto) }}</label>
                                                    </div>
                                                    @error('image')
                                                    <span class="error invalid-feedback">
                                                   {{ $message }}
                                                    </span>
                                                    @enderror
                                                  </div>




                                        </div>
                                        <!-- /.card-body -->
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button  type="submit" class="btn btn-primary">Save changes</button>
                                          </div>
                                    </form>



                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>

                            @endforeach
                            </tbody>
                          </table>

                    </div>
                    <!-- /.card-body -->
                  </div>

                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">UMKM di tempat wisata</h3>

                      <div class="card-tools">

                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-usaha"><i class="fas fa-plus-circle"></i></a>
                    </div>

                      </div>


                    <div class="card-body table-responsive">
                        <table class="table table-bordered" id="datatable2">
                            <thead>
                              <tr>
                                <th style="width: 10px">NO</th>
                                <th style="width: 100px">Image</th>
                                <th>Nama</th>
                                <th>Pemilik</th>
                                <th>Jenis</th>
                                <th>Tanggal</th>

                                <th  style="width: 50px">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>

                                @foreach($wisata->usaha as $usaha)
                                <tr>
                                    <td class="font-weight-bold">{{$loop->iteration}}</td>

                                    <td> <img  src="{{asset($usaha->foto)}}" class="img-fluid img-thumbnail" alt="Attachment Image"></td>
                                    <td>{{ $usaha->nama }}</td>
                                    <td>{{ $usaha->pedagang->nama }}</td>
                                    <td>{{ $usaha->jenis }}</td>
                                    <td>{{ $usaha->tanggal }}</td>

                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#"class="btn btn-primary"  data-toggle="modal" data-target="#modal-usaha{{$usaha->id}}"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger delete2"  data-id="{{$usaha->id}}"><i class="fas fa-trash"></i></a>

                                        </div>


                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-usaha{{$usaha->id}}">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Tambah Usaha</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>

                                        <form action="{{ route('usaha.update',$usaha->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <!-- /.card-header -->
                                        <div class="modal-body">

                                            <div class="text-center">
                                                <img  src="{{asset($usaha->foto)}}" id="image_usaha{{$usaha->id}}" class="img-fluid img-thumbnail my-4" style="width:300px;height:150px;" alt="Attachment Image">
                                            </div>
                                                <div class="form-group">
                                                    <label>Nama Usaha</label>
                                                    <input type="text" name="nama"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    placeholder="{{ __('Nama Usaha') }}"
                                                    value="{{ old('nama',$usaha->nama) }}"
                                                    required>

                                                    @error('nama')
                                                     <span class="error invalid-feedback">
                                                        {{ $message }}
                                                     </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Pemilik</label>
                                                    <select class="form-control" id="pedagang_id" name="pedagang_id" required>
                                                        <option selected disabled selected disabled value="">- Silahkan Pilih Pemilik -</option>
                                                        @foreach(pedagang() as $mp)
                                                        <option value="{{$mp->id}}" {{(old('pedagang_id',$usaha->pedagang_id) == $mp->id) ? ' selected' : ''}}>{{$mp->nama}}</option>


                                                        @endforeach
                                                    </select>

                                                     @error('jenis')
                                                     <span class="error invalid-feedback">
                                                      {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>


                                                <div class="form-group">
                                                    <label>Jenis</label>
                                                    <input type="text" name="jenis"
                                                    class="form-control @error('jenis') is-invalid @enderror"
                                                    placeholder="{{ __('Jenis Fasilitas') }}" value="{{ old('jenis',$usaha->jenis) }}" required>

                                                     @error('jenis')
                                                     <span class="error invalid-feedback">
                                                      {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Tanggal Pendaftaran</label>
                                                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                                                            placeholder="{{ __('Tanggal') }}" required autocomplete="tanggal" value="{{ old('tanggal',$usaha->tanggal) }}" autofocus>

                                                     @error('tanggal')
                                                     <span class="error invalid-feedback">
                                                      {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>


                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <textarea class="form-control" rows="3" name="keterangan"   @error('keterangan') is-invalid @enderror placeholder="Enter ..." required>{{ old('keterangan',$usaha->keterangan) }}</textarea>

                                                     @error('keterangan')
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
                                                    placeholder="{{ __('File image') }}" onchange="document.getElementById('image_usaha{{$usaha->id}}').src = window.URL.createObjectURL(this.files[0])" >
                                                      <label class="custom-file-label" for="customFile" >{{ old('image',$usaha->foto) }}</label>
                                                    </div>
                                                    @error('image')
                                                    <span class="error invalid-feedback">
                                                   {{ $message }}
                                                    </span>
                                                    @enderror
                                                  </div>




                                        </div>
                                        <!-- /.card-body -->
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button  type="submit" class="btn btn-primary">Save changes</button>
                                          </div>
                                    </form>



                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                                   @endforeach
                            </tbody>
                          </table>

                    </div>
                    <!-- /.card-body -->
                  </div>


                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Jadwal Even</h3>
                      <div class="card-tools">
                        <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-even"><i class="fas fa-plus-circle"></i></a>
                      </div>

                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered" id="datatable3">
                            <thead>
                              <tr>
                                <th style="width: 10px">NO</th>
                                <th style="width: 100px">Poster</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Tanggal</th>

                                <th  style="width: 50px">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>

                                @foreach($wisata->even as $even)
                                <tr>
                                    <td class="font-weight-bold">{{$loop->iteration}}</td>

                                    <td> <img  src="{{asset($even->poster)}}" class="img-fluid img-thumbnail" alt="Attachment Image"></td>
                                    <td>{{ $even->nama }}</td>
                                    <td>{{ $even->jenis }}</td>
                                    <td>{{ $even->tanggal }}</td>

                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#"class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-even{{$even->id}}"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger delete3"  data-id="{{$even->id}}"><i class="fas fa-trash"></i></a>
                                        </div>


                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-lg-even{{$even->id}}">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Ubah Even</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>

                                        <form action="{{ route('even.update',$even->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <!-- /.card-header -->
                                        <div class="modal-body">

                                            <div class="text-center">
                                                <img  src="{{asset($even->poster)}}" id="image_fasilitas{{$fasilitas->id}}" class="img-fluid img-thumbnail my-4" style="width:300px;height:150px;" alt="Attachment Image">
                                            </div>

                                                <div class="form-group">
                                                    <label>Nama Even</label>
                                                    <input type="text" name="nama"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    placeholder="{{ __('Nama Fasilitas') }}"
                                                    value="{{ old('nama',$even->nama) }}"
                                                    required>

                                                    @error('nama')
                                                     <span class="error invalid-feedback">
                                                        {{ $message }}
                                                     </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Jenis Even</label>
                                                    <input type="text" name="jenis"
                                                    class="form-control @error('jenis') is-invalid @enderror"
                                                    placeholder="{{ __('Jenis Even') }}" value="{{ old('jenis',$even->jenis) }}" required>

                                                     @error('jenis')
                                                     <span class="error invalid-feedback">
                                                      {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Tanggal Even</label>
                                                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                                                            placeholder="{{ __('Tanggal Even') }}" required autocomplete="tanggal" value="{{ old('tanggal',$even->tanggal) }}" autofocus>

                                                     @error('tanggal')
                                                     <span class="error invalid-feedback">
                                                      {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>


                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <textarea class="form-control" rows="3" name="keterangan"   @error('keterangan') is-invalid @enderror placeholder="Enter ..." required>{{ old('keterangan',$even->keterangan) }}</textarea>

                                                     @error('keterangan')
                                                     <span class="error invalid-feedback">
                                                      {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>

                                                  <div class="form-group">
                                                    <label>Poster</label>
                                                    <div class="custom-file">
                                                    <input type="file" name="image"
                                                    class="custom-file-input @error('image') is-invalid @enderror"
                                                    id="customFile"
                                                    placeholder="{{ __('File image') }}" onchange="document.getElementById('image_fasilitas{{$even->id}}').src = window.URL.createObjectURL(this.files[0])">
                                                      <label class="custom-file-label" for="customFile" >{{ old('image',$even->poster) }}</label>
                                                    </div>
                                                    @error('image')
                                                    <span class="error invalid-feedback">
                                                   {{ $message }}
                                                    </span>
                                                    @enderror
                                                  </div>




                                        </div>
                                        <!-- /.card-body -->
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button  type="submit" class="btn btn-primary">Save changes</button>
                                          </div>
                                    </form>



                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>

                            @endforeach
                            </tbody>
                          </table>

                    </div>
                    <!-- /.card-body -->
                  </div>

            </div>
        </div>
        </div>

        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Tambah Fasilitas</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="{{ route('fasilitas.store',$wisata->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <!-- /.card-header -->
                <div class="modal-body">

                    <div class="text-center">
                        <img  src="{{asset('images/wisata.png')}}" id="image_fasilitas" class="img-fluid img-thumbnail my-4" style="width:300px;height:150px;" alt="Attachment Image">
                    </div>

                        <div class="form-group">
                            <label>Nama Fasilitas</label>
                            <input type="text" name="nama"
                            class="form-control @error('nama') is-invalid @enderror"
                            placeholder="{{ __('Nama Fasilitas') }}"
                            value="{{ old('nama') }}"
                            required>

                            @error('nama')
                             <span class="error invalid-feedback">
                                {{ $message }}
                             </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Jenis Fasilitas</label>
                            <input type="text" name="jenis"
                            class="form-control @error('jenis') is-invalid @enderror"
                            placeholder="{{ __('Jenis Fasilitas') }}" value="{{ old('jenis') }}" required>

                             @error('jenis')
                             <span class="error invalid-feedback">
                              {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" name="tahun"
                            class="form-control @error('tahun') is-invalid @enderror"
                            placeholder="{{ __('tahun') }}" value="{{ old('tahun') }}" required>

                             @error('tahun')
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
                            placeholder="{{ __('File image') }}" onchange="readFasilitas(this);" required>
                              <label class="custom-file-label" for="customFile" >{{ old('image') }}</label>
                            </div>
                            @error('image')
                            <span class="error invalid-feedback">
                           {{ $message }}
                            </span>
                            @enderror
                          </div>




                </div>
                <!-- /.card-body -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button  type="submit" class="btn btn-primary">Save changes</button>
                  </div>
            </form>



              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
          <div class="modal fade" id="modal-usaha">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Tambah Usaha</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="{{ route('usaha.store',$wisata->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <!-- /.card-header -->
                <div class="modal-body">

                    <div class="text-center">
                        <img  src="{{asset('images/wisata.png')}}" id="image_usaha" class="img-fluid img-thumbnail my-4" style="width:300px;height:150px;" alt="Attachment Image">
                    </div>
                        <div class="form-group">
                            <label>Nama Usaha</label>
                            <input type="text" name="nama"
                            class="form-control @error('nama') is-invalid @enderror"
                            placeholder="{{ __('Nama Usaha') }}"
                            value="{{ old('nama') }}"
                            required>

                            @error('nama')
                             <span class="error invalid-feedback">
                                {{ $message }}
                             </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Pemilik</label>
                            <select class="form-control" id="pedagang_id" name="pedagang_id" required>
                                <option selected disabled selected disabled value="">- Silahkan Pilih Pemilik -</option>
                                @foreach(pedagang() as $mp)
                                    <option value="{{$mp->id}}" @if ("{{old('pedagang_id')}}" == $mp->id)
                                        selected
                                    @endif >{{$mp->nama}}</option>

                                @endforeach
                            </select>

                             @error('jenis')
                             <span class="error invalid-feedback">
                              {{ $message }}
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Jenis</label>
                            <input type="text" name="jenis"
                            class="form-control @error('jenis') is-invalid @enderror"
                            placeholder="{{ __('Jenis Fasilitas') }}" value="{{ old('jenis') }}" required>

                             @error('jenis')
                             <span class="error invalid-feedback">
                              {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tanggal Pendaftaran</label>
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                                    placeholder="{{ __('Tanggal') }}" required autocomplete="tanggal" autofocus>

                             @error('tanggal')
                             <span class="error invalid-feedback">
                              {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" rows="3" name="keterangan"   @error('keterangan') is-invalid @enderror placeholder="Enter ..." required>{{ old('keterangan') }}</textarea>

                             @error('keterangan')
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
                            placeholder="{{ __('File image') }}" onchange="readUsaha(this);" required>
                              <label class="custom-file-label" for="customFile" >{{ old('image') }}</label>
                            </div>
                            @error('image')
                            <span class="error invalid-feedback">
                           {{ $message }}
                            </span>
                            @enderror
                          </div>

                </div>
                <!-- /.card-body -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button  type="submit" class="btn btn-primary">Save changes</button>
                  </div>
            </form>



              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>

          <div class="modal fade" id="modal-even">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Tambah Even</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="{{ route('even.store',$wisata->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <!-- /.card-header -->
                <div class="modal-body">

                    <div class="text-center">
                        <img  src="{{asset('images/wisata.png')}}" id="image_even" class="img-fluid img-thumbnail my-4" style="width:300px;height:150px;" alt="Attachment Image">
                    </div>

                        <div class="form-group">
                            <label>Nama Even</label>
                            <input type="text" name="nama"
                            class="form-control @error('nama') is-invalid @enderror"
                            placeholder="{{ __('Nama Even') }}"
                            value="{{ old('nama') }}"
                            required>

                            @error('nama')
                             <span class="error invalid-feedback">
                                {{ $message }}
                             </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Jenis Even</label>
                            <input type="text" name="jenis"
                            class="form-control @error('jenis') is-invalid @enderror"
                            placeholder="{{ __('Jenis Even') }}" value="{{ old('jenis') }}" required>

                             @error('jenis')
                             <span class="error invalid-feedback">
                              {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tanggal Even</label>
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                                    placeholder="{{ __('Tanggal Even') }}" required autocomplete="tanggal" autofocus>

                             @error('tanggal')
                             <span class="error invalid-feedback">
                              {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" rows="3" name="keterangan"   @error('keterangan') is-invalid @enderror placeholder="Enter ..." required>{{ old('keterangan') }}</textarea>

                             @error('keterangan')
                             <span class="error invalid-feedback">
                              {{ $message }}
                            </span>
                            @enderror
                        </div>


                          <div class="form-group">
                            <label>Poster</label>
                            <div class="custom-file">
                            <input type="file" name="image"
                            class="custom-file-input @error('image') is-invalid @enderror"
                            id="customFile"
                            placeholder="{{ __('File image') }}" onchange="readEven(this);" required>
                              <label class="custom-file-label" for="customFile" >{{ old('image') }}</label>
                            </div>
                            @error('image')
                            <span class="error invalid-feedback">
                           {{ $message }}
                            </span>
                            @enderror
                          </div>




                </div>
                <!-- /.card-body -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button  type="submit" class="btn btn-primary">Save changes</button>
                  </div>
            </form>



              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
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
    $(document).ready(function(){
        $('#datatable').DataTable({
            "pageLength": 5
        });
        $('.delete').click(function(){
          var data_id = $(this).attr('data-id');
          Swal.fire({
    title: "Hapus Fasilitas?",
    text: "anda yakin mau menghapus fasilitas ini ??",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus fasilitas!'
}).then((result) => {
  if (result.isConfirmed) {
    var url = "{{ route('fasilitas.delete', 'id') }}";
    url = url.replace('id', data_id);
    window.location = url
  }
});
      });
    });
  </script>

<script>
    $(document).ready(function(){
        $('#datatable2').DataTable({
            "pageLength": 5
        });
        $('.delete2').click(function(){
          var data_id = $(this).attr('data-id');
          Swal.fire({
    title: "Hapus Usaha?",
    text: "anda yakin mau menghapus Usaha ini ??",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus Usaha!'
}).then((result) => {
  if (result.isConfirmed) {
    var url = "{{ route('usaha.delete', 'id') }}";
    url = url.replace('id', data_id);
    window.location = url
  }
});
      });
    });
  </script>

<script>
    $(document).ready(function(){
        $('#datatable3').DataTable({
            "pageLength": 5
        });
        $('.delete3').click(function(){
          var data_id = $(this).attr('data-id');
          Swal.fire({
    title: "Hapus Even?",
    text: "anda yakin mau menghapus Even ini ??",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus Even!'
}).then((result) => {
  if (result.isConfirmed) {
    var url = "{{ route('even.delete', 'id') }}";
    url = url.replace('id', data_id);
    window.location = url
  }
});
      });
    });
  </script>


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

<script>
    function readFasilitas(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#image_fasilitas').attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>

<script>
    function readUsaha(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#image_usaha').attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>

<script>
    function readEven(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#image_even').attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endsection
