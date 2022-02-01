@extends('template')

@section('tittle')
    Pendaftaran Skripsi atau Tugas Akhir
@endsection

@section('konten')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pendaftar Sidang</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        ID Daftar Sidang
                                    </th>
                                    <th>
                                        NIM
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        Prodi
                                    </th>
                                    <th>
                                        Judul Skripsi
                                    </th>
                                    <th>
                                        Jenis Sidang
                                    </th>
                                    <th>
                                        Tanggal
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sidang as $item)
                                    <tr>
                                        <td>
                                            {{ $item->id }}
                                        </td>
                                        <td>
                                            {{ $item->nim }}
                                        </td>
                                        <td>
                                            {{ $item->nama }}
                                        </td>
                                        <td>
                                            {{ $item->prodi['nama_prodi'] }}
                                        </td>
                                        <td>
                                            {{ $item->judul_skripsi }}
                                        </td>
                                        <td>
                                            {{ $item->jenis_sidang }}
                                        </td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            <a type="button" href="{{ $item->file }}" download
                                                class="btn-sm btn-inverse-info btn-rounded m-lg-1" data-toggle="tooltip"
                                                data-placement="top" title="Download File">
                                                <i class="mdi mdi-format-vertical-align-bottom"></i>
                                            </a>

                                            @if (auth()->user()->user == 'admin')
                                                <a type="button" href="/editdataSidang/{{ $item->id }}"
                                                    class="btn-sm btn-inverse-dark btn-rounded m-lg-1" data-toggle="tooltip"
                                                    data-placement="top" title="Edit">
                                                    <i class="mdi mdi-border-color"></i>
                                                </a>
                                                <a type="button" href="/hapusdataSidang/{{ $item->id }}"
                                                    onclick="return confirm('Apakah anda yakin menghapus data?')"
                                                    class="btn-sm btn-inverse-danger btn-rounded m-lg-1"
                                                    data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            @endif
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
