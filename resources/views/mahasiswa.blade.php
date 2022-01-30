<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@extends('template')

@section('tittle')
    Input Mahasiswa
@endsection

@section('konten')
<form action="simpanMahasiswa" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table>
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" name="nim" id="nim" value="{{old('nim')}}"> <br/>
            @error('nim')
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning!</strong>
                <span> {{$message}} </span>
                <br>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning!</strong>
                <span> {{$message}} </span>
                <br>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
            @error('email')
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning!</strong>
                <span> {{$message}} </span>
                <br>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin" value="{{old('jenis_kelamin')}}">
                <option>Laki-Laki</option>
                <option>Perempuan</option>
                <option>Lainnya</option>
              </select>
        </div>
        <div class="form-group">
            <label for="id_prodi">Jurusan</label>
            <select class="custom-select" id="id_prodi" name="id_prodi" value="{{old('id_prodi')}}">
            <option selected disabled>Select one</option>
                @foreach ($viewMhs as $item )
                    <option value="{{$item->id}}">{{$item->nama_prodi}}</option>
                @endforeach
            </select>
        </div>
            <div class="form-group">
                <label for="tahun_masuk">Tahun Masuk</label>
                <input type="text" class="form-control" name="tahun_masuk" id="tahun_masuk" value="{{old('tahun_masuk')}}"> <br/>
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
                <label for="foto">Foto</label>
                <input type="file" class="form-control" name="foto" id="foto" value="{{old('foto')}}"> <br/>
                @error('foto')
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong>
                    <span> {{$message}} </span>
                    <br>
                </div>
                @enderror
            </div>
        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
    </table>
</form>
</table>
@endsection

@section('footer')
<footer class="footer">
    <div class="card">
        <div class="card-body">
            <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © Faridnabil</a>2021</span>
            </div>
        </div>
    </div>
</footer>
@endsection
