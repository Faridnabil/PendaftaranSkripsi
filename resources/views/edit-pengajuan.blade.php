@extends('template')

@section('tittle')
    Pendaftaran Skripsi atau Tugas Akhir
@endsection

@section('konten')
    <h4>Pengajuan Proposal Mahasiswa</h4>
    <button class="btn-primary"> <a href="pengajuan">Status Pengajuan</button> <button class="btn-primary"> <a href="daftar-pengajuan"> Daftar Pengajuan</button>    <hr>
    <form action="editPengajuan" method="POST" enctype="multipart/form-data">
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
            <button type="submit" class="btn btn-primary" name="submit" value="Submit">Edit Data</button>
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
