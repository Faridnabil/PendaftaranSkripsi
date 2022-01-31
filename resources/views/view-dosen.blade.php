@extends('template')

@section('tittle')
    Data Dosen
@endsection

@section('konten')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Dosen | <a href="/tambahDosen" class="btn btn-primary btn-sm"> Klik Disini</a>
                </h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    User
                                </th>
                                <th>
                                    NID
                                </th>
                                <th>
                                    Nama Lengkap
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Jenis Kelamin
                                </th>
                                <th>
                                    Jurusan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewDsn as $item)
                                <tr>
                                    <td class="py-1">
                                        <img src="{{ $item->foto }}" />
                                    </td>
                                    <td>
                                        {{ $item->nid }}
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        {{ $item->jenis_kelamin }}
                                    </td>
                                    <td>
                                        {{ $item->prodi['nama_prodi'] }}
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
