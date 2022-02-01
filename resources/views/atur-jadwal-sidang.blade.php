<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@extends('template')

@section('tittle')
    Pendaftaran Skripsi atau Tugas Akhir
@endsection

@section('konten')
    <h4>Atur Jadwal Sidang</h4>
    <form action="simpanJadwal" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table>
            <div class="form-group">
                <label for="id_daftarSidang">Nama</label>
                <select class="custom-select" id="id_daftarSidang" name="id_daftarSidang" value="{{ old('id_daftarSidang') }}">
                    <div class="form-group">
                        <option selected disabled>Select one</option>
                        @foreach ($sidang as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_prodi">Nama Prodi</label>
                <select class="custom-select" id="id_prodi" name="id_prodi" value="{{ old('id_prodi') }}">
                    <div class="form-group">
                        <option selected disabled>Select one</option>
                        @foreach ($sidang as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_prodi }}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nid_dosen">Dosen Penguji</label>
                <select class="custom-select" id="nid_dosen" name="nid_dosen" value="{{ old('nid_dosen') }}">
                    <div class="form-group">
                        <option selected disabled>Select one</option>
                        @foreach ($sidang as $item)
                            <option value="{{ $item->nid }}">{{ $item->name }}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nid_dosen">Dosen Penguji 2</label>
                <select class="custom-select" id="nid_dosen" name="nid_dosen" value="{{ old('nid_dosen') }}">
                    <div class="form-group">
                        <option selected disabled>Select one</option>
                        @foreach ($sidang as $item)
                            <option value="{{ $item->nid }}">{{ $item->name }}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Sidang</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal"
                    value="{{ old('tanggal') }}">
                @error('tanggal')
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong>
                        <span> {{ $message }} </span>
                        <br>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jam">Jam</label>
                <input type="time" class="form-control" name="jam" id="jam"
                    value="{{ old('jam') }}">
                @error('jam')
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong>
                        <span> {{ $message }} </span>
                        <br>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="ruangan">Ruangan</label>
                <select class="custom-select" id="ruangan" name="ruangan"
                    value="{{ old('ruangan') }}">
                    <option>B1</option>
                    <option>B2</option>
                    <option>B3</option>
                    <option>B4</option>
                    <option>B5</option>
                    <option>B6</option>
                    <option>B7</option>
                    <option>B8</option>
                </select>
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
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                        Faridnabil</a>2021</span>
                </div>
            </div>
        </div>
    </footer>
@endsection

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
