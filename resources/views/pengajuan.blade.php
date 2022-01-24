@extends('template')

@section('tittle')
    Pendaftaran Skripsi atau Tugas Akhir
@endsection

@section('konten')
    <h4>Pengajuan Proposal Mahasiswa</h4>
    <hr>
    <form action="simpanPengajuan" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table>
            <div class="form-group">
                <label for="nim">NIM</label>
                <select class="custom-select" id="nim" name="nim" value="{{ old('nim') }}">
                    <option selected disabled>Select one</option>
                    @foreach ($viewMhs as $item)
                        <option value="{{ $item->id }}">{{ $item->nim }}</option>
                    @endforeach
                </select>
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
                <label for="file_proposal">File Proposal</label>
                <input type="file" class="form-control" name="file_proposal" id="file_proposal"
                    value="{{ old('file_proposal') }}">
                @error('file_proposal')
                    <div class="alert alert-danger alert-dismissible" style="margin-top:-20px" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong>
                        <span> {{ $message }} </span>
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
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                        Faridnabil</a>2021</span>
                </div>
            </div>
        </div>
    </footer>
@endsection
