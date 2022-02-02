@extends('template')

@section('tittle')
    Pendaftaran Skripsi atau Tugas Akhir
@endsection

@section('konten')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hasil Nilai Sidang</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        ID Nilai
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
                                        Nilai Penguji
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nilai[2] as $item)
                                    <tr>
                                        <td>
                                            {{ $item->id }}
                                        </td>
                                        <td>
                                            {{ $item->daftarSidang['nim']}}
                                        </td>
                                        <td>
                                            {{ $item->daftarSidang['nama']}}
                                        </td>
                                        <td>
                                            {{ $item->prodi['nama_prodi'] }}
                                        </td>
                                        <td>
                                            {{ $item->nilai_penguji }}
                                        </td>
                                        <td>
                                            @if ($item->nilai_penguji>=60)
                                                Lulus
                                            @else
                                                Tidak Lulus
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
