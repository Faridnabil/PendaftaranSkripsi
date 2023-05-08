@extends('template')

@section('tittle')
    Pendaftaran Skripsi atau Tugas Akhir
@endsection

@section('konten')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pengajuan</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        ID Nota
                                    </th>
                                    <th>
                                        Judul Pengajuan
                                    </th>
                                    <th>
                                        NIM
                                    </th>
                                    <th>
                                        Prodi
                                    </th>
                                    <th>
                                        Pembimbing
                                    </th>
                                    <th>
                                        Batas Bimbingan
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nota as $item)
                                    <tr>
                                        <td>
                                            {{ $item->id }}
                                        </td>
                                        <td>
                                            {{ $item->pengajuan['judul_proposal'] }}
                                        </td>
                                        <td>
                                            {{ $item->pengajuan['nim'] }}
                                        </td>
                                        <td>
                                            {{ $item->prodi['nama_prodi'] }}
                                        </td>
                                        <td>
                                            {{ $item->dosen['name'] }}
                                        </td>
                                        <td>
                                            {{ $item->batas_bimbingan }}
                                        </td>
                                        <td>
                                            <label class="badge {{$item->status == 1 ? 'badge-danger' : 'badge-success'}}">
                                                {{$item->status == 1 ? 'Tidak Aktif' : 'Aktif'}}
                                            </label>
                                        </td>
                                        <td>
                                            <a type="button" href="{{ $item->file }}" download
                                                class="btn-sm btn-inverse-info btn-rounded m-lg-1" data-toggle="tooltip"
                                                data-placement="top" title="Download File">
                                                <i class="mdi mdi-format-vertical-align-bottom"></i>
                                            </a>
                                        </td>
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
