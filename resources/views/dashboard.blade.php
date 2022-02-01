@extends('template')

@section('tittle')
    Pendaftaran Skripsi atau Tugas Akhir
@endsection

@section('konten')
    <h4 class="card-title">Dashboard</h4>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Jumlah Mahasiswa <i
                            class="mdi mdi-account mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"> {{ $data[0]}}</h2>
                    <a href="/viewMahasiswa" class="text-decoration-none text-white">
                        <h6 class="card-text">View Detail </h6>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Jumlah Dosen<i
                            class="mdi mdi-account mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ $data[1]}}</h2>
                    <a href="/viewDosen" class="text-decoration-none text-white">
                        <h6 class="card-text">View Detail </h6>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Jumlah Pengajuan <i class="mdi mdi-receipt mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ $data[2]}}</h2>
                    <a href="/dataPengajuan" class="text-decoration-none text-white">
                        <h6 class="card-text">View Detail </h6>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-warning card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Mahasiswa Bimbingan <i class="mdi mdi-receipt mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ $data[3]}}</h2>
                    <a href="/viewNota" class="text-decoration-none text-white">
                        <h6 class="card-text">View Detail </h6>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-primary card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Pendafatar Mahasiswa Sidang <i class="mdi mdi-receipt mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ $data[4]}}</h2>
                    <a href="/viewDaftarSidang" class="text-decoration-none text-white">
                        <h6 class="card-text">View Detail </h6>
                    </a>
                </div>
            </div>
        </div>
        <!--
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Skripsi Mahasiswa <i class="mdi mdi-receipt mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">$data[5]}}</h2>
                    <a href="/dataPengajuan" class="text-decoration-none text-white">
                        <h6 class="card-text">View Detail </h6>
                    </a>
                </div>
            </div>
        </div>
        -->
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
