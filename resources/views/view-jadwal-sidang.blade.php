@extends('template')

@section('tittle')
    Pendaftaran Skripsi atau Tugas Akhir
@endsection

@section('konten')
    <a type="Button" class="btn btn-inverse-primary" href="viewDaftarSidang">Data Sidang </a>
    <a type="Button" class="btn btn-primary" href="viewJadwal"> Jadwal Sidang </a>
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
                                        ID Sidang
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
                                        Penguji
                                    </th>
                                    <th>
                                        Jenis Sidang
                                    </th>
                                    <th>
                                        Tanggal
                                    </th>
                                    <th>
                                        Jam
                                    </th>
                                    <th>
                                        Ruangan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sidang[3] as $item)
                                    <tr>
                                        <td>
                                            {{ $item->id }}
                                        </td>
                                        <td>
                                            {{ $item->daftarSidang['nim'] }}
                                        </td>
                                        <td>
                                            {{ $item->daftarSidang['nama'] }}
                                        </td>
                                        <td>
                                            {{ $item->prodi['nama_prodi'] }}
                                        </td>
                                        <td>
                                            {{ $item->dosen['name'] }}
                                        </td>
                                        <td>
                                            {{ $item->daftarSidang['jenis_sidang'] }}
                                        </td>
                                        <td>
                                            {{ $item->tanggal }}
                                        </td>
                                        <td>
                                            {{ $item->jam }}
                                        </td>
                                        <td>
                                            {{ $item->ruangan }}
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
