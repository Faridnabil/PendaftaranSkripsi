@extends('template')

@section('tittle')
    Pendaftaran Skripsi atau Tugas Akhir
@endsection

@section('konten')
    <h4>Edit Proposal Mahasiswa</h4>
    <form action="/updateNilai/{{ $nilai->id }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table>
            <div class="form-group">
                <label for="nilai_penguji">Nilai Penguji</label>
                <input type="text" class="form-control" name="nilai_penguji" id="nilai_penguji"
                    value="{{ $nilai->nilai_penguji }}"> <br />
                @error('nilai_penguji')
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
                <label for="id_daftarSidang">Nama</label>
                <select class="custom-select" id="id_daftarSidang" name="id_daftarSidang">
                    <<option value="{{ $nilai->id_prodi }}">{{ $nilai->daftarSidang['nama'] }}</option>
                    @foreach ($sidang as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_prodi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_prodi">Nama Prodi</label>
                <select class="custom-select" id="id_prodi" name="id_prodi">
                    <option value="{{ $nilai->id_prodi }}">{{ $nilai->prodi['nama_prodi'] }}</option>
                    @foreach ($prodi as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_prodi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">status</label>
                <input type="text" class="form-control" name="status" id="status" value="{{ $nilai->status }}"> <br />
                @error('status')
                    <div class="alert alert-danger alert-dismissible" style="margin-top: -20px" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong>
                        <span> {{ $message }} </span>
                        <br>
                    </div>
                @enderror
            </div>
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
