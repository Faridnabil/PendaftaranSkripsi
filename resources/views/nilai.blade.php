<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@extends('template')

@section('tittle')
    Pendaftaran Skripsi atau Tugas Akhir
@endsection

@section('konten')
    <h4>Pemberian Nilai</h4>
    <a type="Button" class="btn btn-inverse-primary" href="pengajuan">Status Pengajuan </a>
    <a type="Button" class="btn btn-primary" href="daftarPengajuan"> Daftar Pengajuan </a>
    <form action="simpanPengajuan" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" name="nim" id="nim" value="{{ old('nim') }}"> <br />
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
                <label for="judul_proposal">Judul Proposal</label>
                <input type="text" class="form-control" name="judul_proposal" id="judul_proposal"
                    value="{{ old('judul_proposal') }}"> <br />
                @error('judul_proposal')
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
                <label>File Proposal</label>
                <input type="file" class="file-upload-default" name="file" value="{{ old('file') }}">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>
                @error('file')
                    <p class="text-danger pt-1"><small> {{ $message }}</small></p>
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
