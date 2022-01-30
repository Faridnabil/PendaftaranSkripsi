<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@extends('template')

@section('tittle')
    Input Dosen
@endsection

@section('konten')
<form action="simpanDosen" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table>
        <div class="form-group">
            <label for="nid">NID</label>
            <input type="text" class="form-control" name="nid" id="nid" value="{{old('nid')}}"> <br/>
            @error('nid')
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning!</strong>
                <span> {{$message}} </span>
                <br>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{old('nama')}}"> <br/>
            @error('nama')
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
            <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}"> <br/>
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
                @foreach ($viewDsn as $item )
                    <option value="{{$item->id}}">{{$item->nama_prodi}}</option>
                @endforeach
            </select>
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
