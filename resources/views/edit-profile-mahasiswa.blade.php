@extends('template')

@section('tittle')
    Edit Profile
@endsection

@section('konten')
    <h4>Edit Profile</h4>
    <form action="/updateProfileMahasiswa/{{ $viewMhs->id }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" name="nim" id="nim" value="{{ $viewMhs->nim }}"> <br />
                @error('nim')
                    <div class="alert alert-danger alert-dismissible" style="margin-top: -20px" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong>
                        <span> {{ $message }} </span>
                        <br>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name"
                    value="{{ $viewMhs->name }}"> <br />
                @error('name')
                    <div class="alert alert-danger alert-dismissible" style="margin-top: -20px" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong>
                        <span> {{ $message }} </span>
                        <br>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email"
                    value="{{ $viewMhs->email }}"> <br />
                @error('email')
                    <div class="alert alert-danger alert-dismissible" style="margin-top: -20px" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong>
                        <span> {{ $message }} </span>
                        <br>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin" value="{{$viewMhs->jenis_kelamin}}">
                    <option>Laki-Laki</option>
                    <option>Perempuan</option>
                    <option>Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="id_prodi">Jurusan</label>
                <select class="custom-select" id="id_prodi" name="id_prodi" value="{{$viewMhs->jenis_kelamin}}">
                <option selected disabled>Select one</option>
                    @foreach ($viewMhs as $item )
                        <option value="{{$item->id}}">{{$item->nama_prodi}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tahun_masuk">Tahun Masuk</label>
                <input type="text" class="form-control" name="tahun_masuk" id="tahun_masuk" value="{{$viewMhs->jenis_kelamin)}}">
                @error('tahun_masuk')
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong>
                    <span> {{$message}} </span>
                    <br>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" class="file-upload-default" name="foto">
                <input type="hidden" name="pathFile" value="{{ $viewMhs->foto }}">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled
                        placeholder="{{ $viewMhs->foto }}">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>
                @error('file')
                    <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="Submit">Edit Data</button>
            <a href="/viewMahasiswa" class="btn btn-light">Cancel</a>
        </table>
    </form>
    </table>
@endsection

@section('footer')
    <footer class="footer">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                        Faridnabil</a>2021</span>
                </div>
            </div>
        </div>
    </footer>
@endsection
